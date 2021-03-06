<?php

namespace App\Http\Controllers;

use App\About;
use App\Admin;
use App\Appointment;
use App\Blog;
use App\Contactus;
use App\Project;
use App\Reservation;
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
        $projects = Project::orderBy('id', 'desc')->limit(5)->get();
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $teamMembers = TeamMember::orderBy('id', 'desc')->limit(4)->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->limit(4)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $themeName = getThemeName();
        $sliders = Slider::orderBy('id', 'desc')->limit(3)->get();

        $times = Reservation::where('doctor_id' , 2)->get();
        $all_patients = Appointment::all()->count();
        $all_doctors = Admin::all()->count();
        $success_mission = Appointment::where('status', 1)->count();

        $doctors = Admin::where('role', '!=', '0')->where('role', '!=', 2)->get();

        return view('site.' . $themeName . '.home',
                    compact('page_filter', 'sliders',
                            'aboutUs', 'contactUs',
                            'projects','services',
                            'teamMembers','testimonials',
                            'blogs', 'times',
                            'all_patients', 'all_doctors',
                            'success_mission', 'doctors'));
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
        $services = Service::orderBy('id', 'desc')->limit(8)->get();

        $all_patients = Appointment::all()->count();
        $all_doctors = Admin::all()->count();
        $success_mission = Appointment::where('status', 1)->count();

        return view('site.' . $name . '.about',
                compact('about', 'testimonials',
                                'teamMembers', 'services',
                                'all_patients', 'all_doctors',
                                'success_mission'));
    }

    public function blogsPage()
    {
        $this->checkVisitor();
        $blogs = Blog::paginate(9);
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $about = About::first();

        return view('site.' . getThemeName() . '.blogs',
                compact('blogs', 'services', 'about'));
    }

    public function showBlog($id, $title)
    {
        $blog = Blog::findOrFail($id);
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $about = About::first();

        return view('site.' . getThemeName() . '.single_blog',
                compact('blog', 'services',
                                'blogs', 'about'));
    }

    public function teamPage()
    {
        $this->checkVisitor();
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $teamMembers = TeamMember::whenSearch(\request()->search)->orderBy('id', 'desc')->limit(9)->get();
        $name = getThemeName();
        $about = About::first();

        return view('site.' . $name . '.team',
                compact('services' , 'teamMembers', 'about'));
    }

    public function servicesPage()
    {
        $this->checkVisitor();
        $name = getThemeName();
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $about = About::first();

        return view('site.' . $name . '.services',
                compact('services', 'blogs', 'about'));
    }

    public function SingleService($id, $title)
    {
        $service = Service::FindOrFail($id);
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $services = Service::orderBy('id', 'desc')->limit(8)->get();

        return view('site.' . getThemeName() . '.single_service',
                compact('service', 'blogs', 'services'));
    }

    public function contact()
    {
        $this->checkVisitor();
        $contactUs = Contactus::first();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $about = About::first();
        return view('site.' . getThemeName() . '.contact', compact('contactUs', 'services', 'about'));
    }
}
