<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Blog;
use App\Contactus;
use App\Http\Controllers\Controller;
use App\Project;
use App\Service;
use App\Slider;
use App\TeamMember;
use App\Testimonial;
use App\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::paginate(10);
        return view('dashboard.themes.index', compact('themes'));
    }

    public function changeTheme()
    {
        if (\request()->ajax()) {
            $id = \request()->route('id');
            $oldTheme = Theme::where('status', 1)->get();
            $this->changeOldStatus($oldTheme);
            $newTheme = Theme::findOrFail($id);
            $this->changeNewStatus($newTheme);

            return response([
                'status'    => true,
                'message'   => __('admin.updated_successfully')
            ]);
        }
        return redirect()->back();
    }

    public function changeOldStatus($themes)
    {
        foreach ($themes as $theme) {
            $theme->status = 0;
            $theme->save();
        }
    }

    public function changeNewStatus($theme)
    {
        $theme->status = 1;
        $theme->save();
    }

    public function showTheme(Request $request)
    {
        session('lang') ?? session()->put('lang', app()->getLocale());

        $aboutUs = About::first();
        $projects = Project::orderBy('id', 'desc')->limit(3)->get();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $teamMembers = TeamMember::orderBy('id', 'desc')->limit(4)->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->limit(3)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $name = $request->route('name');
        $sliders = $name == 'second' ? Slider::orderBy('id', 'desc')->limit(2)->get() : Slider::orderBy('id', 'desc')->limit(3)->get();
        $contactUs = Contactus::first();
        return view('dashboard.themes.' . $name ,
            compact('sliders',
                'aboutUs', 'projects',
                'services', 'teamMembers',
                'testimonials', 'blogs', 'contactUs'));
    }
}
