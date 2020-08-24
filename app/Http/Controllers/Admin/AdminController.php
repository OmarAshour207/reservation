<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Project;
use App\Service;
use App\TeamMember;
use App\Testimonial;
use App\Visitor;
use App\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Analytics;
use App\Appointment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
    public function showDashboard()
    {


        session('lang') ?? session()->put('lang', app()->getLocale());
        $services_count = Service::all()->count();
        $projects_count = Project::all()->count();
        $contacts_count = Contact::all()->count();
        $testimonials_count = Testimonial::all()->count();
        $members_count = TeamMember::all()->count();
        $blogs_count = Blog::all()->count();
        $appointment_count = Appointment::all()->count();

        $settings = WebsiteSetting::first();
        $visible_sections = count(unserialize($settings->page_filter));
        $hidden_sections = 8 - $visible_sections;

        $visitors = Visitor::all();
        $visitors_count = $visitors->count();
        $temp_most_visited = $this->getMostVisited(7);
        $most_visited = $temp_most_visited[0];
        $most_visited_page = $temp_most_visited[1];
        $pages_in_percentage = $this->getVisitedPagesInPercentage($visitors_count, 7);

        $visited_pages_in_month = $this->getCountsPagesForStats(30);

        $status_percantage = $this->getStatusPercantage($appointment_count);
        $status_in_time = $this->getAppointmentsStatusCount();

        return view('dashboard.home', compact(
            'services_count', 'projects_count',
                    'contacts_count', 'testimonials_count',
                    'members_count', 'blogs_count',
                    'visible_sections', 'hidden_sections',
                    'appointment_count', 'visitors_count',
                    'most_visited', 'most_visited_page',
                    'pages_in_percentage', 'visited_pages_in_month',
                    'status_percantage', 'status_in_time'
        ));
    }

    public function getCountsPagesForStats($days)
    {
        $pages = $this->getVisitedPages($days);
        return array_values($pages);
    }

    public function getVisitedPagesInPercentage($visitors_count, $days)
    {
        $pages = $this->getVisitedPagesAllTime();

        foreach ($pages as $index => $page) {
            $pages[$index] = round(($page / $visitors_count) * 100);
        }
        return $pages;
    }

    public function getVisitedPagesAllTime()
    {
        $visitors_data = Visitor::all();
        $pages = [
            'home'      => 0,
            'about'     => 0,
            'services'  => 0,
            'projects'  => 0,
            'blogs'     => 0,
            'contact-us'=> 0,
            'appointments' => 0
        ];
        foreach ($visitors_data as $data) {
            foreach ($pages as $index => $page) {
                if ($data->page == $index) {
                    $pages[$index] += 1;
                }
            }
        }
        return $pages;
    }

    public function getVisitedPages($days)
    {
        // Most Visited through 1 week
        $date = Carbon::today()->subDays($days);
        $visitors_data = Visitor::where('created_at', '>=', $date)->get();
        $pages = [
            'home'      => 0,
            'about'     => 0,
            'services'  => 0,
            'projects'  => 0,
            'blogs'     => 0,
            'contact-us'=> 0,
            'appointments'=> 0
        ];
        foreach ($visitors_data as $data) {
            foreach ($pages as $index => $page) {
                if ($data->page == $index) {
                    $pages[$index] += 1;
                }
            }
        }
        return $pages;
    }

    public function getMostVisited($days)
    {
        $data = [];
        // Most Visited through 1 week
        $date = Carbon::today()->subDays($days);
        $visitors_data = Visitor::where('created_at', '>=', $date)->get();
        $pages = [
            'home'      => 0,
            'about'     => 0,
            'services'  => 0,
            'projects'  => 0,
            'blogs'     => 0,
            'contact-us'=> 0,
            'appointments'=> 0
        ];
        $most_visited = 0;
        $most_visited_page = '';
        foreach ($visitors_data as $data) {
            foreach ($pages as $index => $page) {
                if ($data->page == $index) {
                    $pages[$index] += 1;
                    if ($most_visited <= $pages[$index] ) {
                        $most_visited = $pages[$index];
                        $most_visited_page = $index;
                    }
                }
            }
        }
        $data = [$most_visited, $most_visited_page];
        return $data;
    }

    public function getAppointmentsStatusCount()
    {
        $appointments = Appointment::whenSearch(request())->select('status')->get();
        $status = [
            0       => 0,
            1       => 0,
            2       => 0
        ];

        foreach($appointments as $appointment) {
            foreach ($status as $index => $s) {
                if($appointment->status == $index) {
                    $status[$index] += 1;
                }
            }
        }
        return $status;
    }

    public function getStatusPercantage($appointments_count)
    {
        $status = $this->getAppointmentsStatusCount();

        foreach ($status as $index => $page) {
            $status[$index] = round(($page / $appointments_count) * 100);
        }
        return $status;
    }

}
