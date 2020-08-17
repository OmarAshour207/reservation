<?php

namespace App\Http\Controllers;

use App\About;
use App\Blog;
use App\Contactus;
use App\Project;
use App\Service;
use App\Slider;
use App\TeamMember;
use App\Testimonial;
use App\Visitor;
use App\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        session()->has('lang') ? session()->forget('lang') : '';
        $language == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return redirect()->back();
    }

    public function HomePage()
    {
        $this->checkVisitor();

        session('lang') ?? session()->put('lang', app()->getLocale());
        $websiteSettings = WebsiteSetting::first();
        $page_filter = $websiteSettings->page_filter != null ? unserialize($websiteSettings->page_filter) : '';
        $aboutUs = About::first();
        $contactUs = Contactus::first();
        $projects = Project::orderBy('id', 'desc')->limit(3)->get();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $teamMembers = TeamMember::orderBy('id', 'desc')->limit(4)->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->limit(3)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $themeName = getThemeName();
        $sliders = $themeName == 'second' ? Slider::orderBy('id', 'desc')->limit(2)->get() : Slider::orderBy('id', 'desc')->limit(3)->get();

        return view('site.' . $themeName . '.home',
            compact('page_filter', 'sliders',
                            'aboutUs', 'contactUs', 'projects',
                            'services', 'teamMembers',
                            'testimonials', 'blogs'));
    }

    public function checkVisitor()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $page = \Request::segment(1) ?? 'home';

        $visitors = DB::table('visitors')
                ->where('ip', $ip)
                ->where('page', $page)
                ->latest()
                ->first();

        if($visitors != null) {
//            $afterDay = date( 'Y:m:d H:i:s', (strtotime($created) + (24 * 60 * 60)));
            $created = Carbon::parse($visitors->created_at);

            if(!$created->isCurrentDay()) {
                $this->createVisitor($ip, $page);
            }
        }else {
            $this->createVisitor($ip, $page);
        }
    }

    protected function createVisitor($ip, $page)
    {
        Visitor::create([
            'ip'    => $ip,
            'page'  => $page
        ]);
    }

    public function aboutPage()
    {
        $this->checkVisitor();
        $about = About::first();
        $testimonials = Testimonial::orderBy('id', 'desc')->limit(3)->get();
        $teamMembers = TeamMember::orderBy('id', 'desc')->limit(4)->get();
        $name = getThemeName();
        $services = $name == 'second' || $name =='fourth' ? Service::orderBy('id', 'desc')->limit(6)->get() : '';

        return view('site.' . $name . '.about',
            compact('about', 'testimonials', 'teamMembers', 'services'));
    }

    public function blogsPage()
    {
        $this->checkVisitor();
        $blogs = Blog::paginate(4);
        return view('site.' . getThemeName() . '.blogs', compact('blogs'));
    }

    public function showBlog($id, $title)
    {
        $blog = Blog::findOrFail($id);
        return view('site.' . getThemeName() . '.single_blog', compact('blog'));
    }

    public function projectsPage()
    {
        $this->checkVisitor();
        $projects = Project::orderBy('id', 'desc')->limit(3)->get();
        $about = About::first();
        return view('site.' . getThemeName() . '.projects', compact('projects', 'about'));
    }

    public function servicesPage()
    {
        $this->checkVisitor();
        $name = getThemeName();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();

        $contactUs = $name == 'second' || $name == 'fourth' ? Contactus::first() : '';
        $aboutUs = $name == 'second' || $name == 'fourth' ? About::first() : '';
        return view('site.' . $name . '.services', compact('services', 'contactUs', 'aboutUs'));
    }

    public function SingleService($id, $title)
    {
        $service = Service::FindOrFail($id);
        return view('site.' . getThemeName() . '.single_service', compact('service'));
    }

    public function contact()
    {
        $this->checkVisitor();
        $contactUs = Contactus::first();
        return view('site.' . getThemeName() . '.contact', compact('contactUs'));
    }
}
