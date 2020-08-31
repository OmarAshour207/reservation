<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Appointment;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function index()
    {
        // here we can verify the webhook.
    	// i create a method for that.
    	$this->verifyAccess();

    	$input   = json_decode(file_get_contents('php://input'), true);

    	$id 	 = $input['entry'][0]['messaging'][0]['sender']['id'];
    	$message = '';

        if (isset($input['entry'][0]['messaging'][0]['postback']['payload'])) {
            $message = $input['entry'][0]['messaging'][0]['postback']['payload'];
        } else {
            $message = $input['entry'][0]['messaging'][0]['message']['text'];
        }
        $user    = json_decode($this->getUser($id));

        if($message == 'main_menu') {
            $response = $this->main_menu($id, $user);
        } elseif ($message == 'Book'){
            $response = $this->secondMenu($id);
        } elseif ($message == 'online') {
            $response = $this->onlineAdvice($id, $user);
        } elseif ($message == 'Doctors') {
            $response = $this->doctorTemp($id);
        } elseif($message == 'visit-website') {
            $response = $this->visitWebsite($id);
        } elseif (substr($message,0, 6) == 'doctor'){
            $response = $this->showAppBtn($id);
        }elseif ($message == 'appointments') {
            $response = $this->showAppointments($id);
        } else {
            $response = $this->main_menu($id, $user);
        }


    	$this->sendMessage($response);
    }

    protected function getUser($id = null)
    {
        $url = "https://graph.facebook.com/v8.0/{$id}?fields=first_name,last_name,profile_pic&access_token=" . env('PAGE_ACCESS_TOKEN');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $user = curl_exec($ch);
        curl_close($ch);

        return $user;
    }

    public function main_menu($id, $user)
    {
        return [
            'recipient' => ['id' => $id ],
            'message'  => [
                'attachment' => [
                    'type'  => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements'  => [
                            [
                                'title'     => "Welcome {$user->first_name}",
                                'image_url' => 'https://petersfancybrownhats.com/company_image.png',
                                'subtitle'  => 'Hello for everyone',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url'   => 'http://monraytravel.com',
                                    'webview_height_ratio'  => 'tall'
                                ], 'buttons'    => [
                                    [
                                        'type'  => 'postback',
                                        'payload'   => 'Book',
                                        'title' => 'Book an appointment'
                                    ],
                                    [
                                        'type'  => 'postback',
                                        'payload'   => 'online',
                                        'title' => 'Online advice'
                                    ],
                                    [
                                        'type'  => 'web_url',
                                        'url'   => 'http://monraytravel.com',
                                        'title' => 'visit-website'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    public function secondMenu($id)
    {
        return [
            'recipient' => ['id' => $id ],
            'messaging_type' => 'RESPONSE',
            'message'  => [
                'text' => "Welcome",
                'quick_replies' => [
                    [
                        "content_type" => "text",
                        "title" => "Doctors",
                        "payload" => "http://monraytravel.com/appointments"
                    ],
                    [
                        "content_type" => "text",
                        "title" => "visit-website",
                        "payload" => "http://monraytravel.com/appointments"
                    ]
                ]
            ]
        ];
    }

    public function onlineAdvice($id, $user)
    {
        return [
            'recipient' => ['id' => $id ],
            'message'  => [
                'attachment' => [
                    'type'  => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements'  => [
                            [
                                'title'     => "Welcome {$user->first_name} in Online Advice",
                                'image_url' => 'https://petersfancybrownhats.com/company_image.png',
                                'subtitle'  => 'Online Advice through phone call or internet with price 200LE, please drop your phone number here',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url'   => 'http://monraytravel.com',
                                    'webview_height_ratio'  => 'tall'
                                ], 'buttons'    => [
                                    [
                                        'type'  => 'web_url',
                                        'url'   => 'http://monraytravel.com',
                                        'title' => 'visit-website'
                                    ],
                                    [
                                        'type'  => 'postback',
                                        'payload'   => 'main_menu',
                                        'title' => 'Main Menu'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    public function visitWebsite($id)
    {
        return [
            'recipient' => ['id' => $id ],
            'message'  => [
                'attachment' => [
                    'type'  => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements'  => [
                            [
                                'title'     => 'Welcome',
                                'image_url' => 'https://petersfancybrownhats.com/company_image.png',
                                'subtitle'  => 'Hello for everyone',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url'   => 'http://monraytravel.com',
                                    'webview_height_ratio'  => 'tall'
                                ], 'buttons'    => [
                                    [
                                    'type'  => 'web_url',
                                    'url'   => 'http://monraytravel.com',
                                    'title' => 'visit-website'
                                    ],
                                    [
                                    'type'  => 'postback',
                                    'payload'   => 'main_menu',
                                    'title' => 'Main Menu'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    public function doctorTemp($id)
    {
        $doctors = Admin::where('role', '!=', '0')->get()->toArray();
        $temp = [];
        for ($i = 0;$i < count($doctors); $i++) {
            array_push($temp, [
                    "content_type" => "text",
                    "title" => "doctor_" . $doctors[$i]['name'],
                    "payload" => "http://monraytravel.com/appointments/{$doctors[$i]['id']}",
                    "image_url" => "http://example.com/img/red.png"
                ]
            );
            array_push($temp,
                [
                    "content_type" => "text",
                    "title" => "main_menu",
                    "payload" => "http://example.com/img/red.png",
                    "image_url" => "http://example.com/img/blue.png"
                ]);
        }

        return [
            'recipient' => ['id' => $id ],
            'messaging_type' => 'RESPONSE',
            'message'  => [
                'text' => "chose Doctor",
                'quick_replies' => $temp
            ],
        ];
    }

    public function showAppBtn($id)
    {
        return [
            'recipient' => ['id' => $id ],
            'messaging_type' => 'RESPONSE',
            'message'  => [
                'text' => "chose thing",
                'quick_replies' => [
                    [
                        "content_type" => "text",
                        "title" => "appointments",
                        "payload" => "http://monraytravel.com/appointments",
                        "image_url" => "http://example.com/img/red.png"
                    ],
                    [
                        "content_type" => "text",
                        "title" => "visit-website",
                        "payload" => "http://monraytravel.com/appointments",
                        "image_url" => "http://example.com/img/blue.png"
                    ]
                ]
            ],
        ];
    }

    public function showAppointments($id)
    {
        $slots = $this->showTimes();

        $slots = array_values($slots);
        $temp = [];
        for ($i = 0;$i < count($slots); $i++) {
            array_push($temp, [
                    "content_type" => "text",
                    "title" => date('g:i A', strtotime($slots[$i])),
                    "payload" => "http://monraytravel.com/appointments",
                    "image_url" => "http://example.com/img/red.png"
                ]
            );
        }
        array_push($temp,
            [
                "content_type" => "text",
                "title" => "main_menu",
                "payload" => "http://example.com/img/red.png",
                "image_url" => "http://example.com/img/blue.png"
            ]);

        return [
            'recipient' => ['id' => $id ],
            'messaging_type' => 'RESPONSE',
            'message'  => [
                'text' => "chose thing",
                'quick_replies' => $temp
            ],
        ];
    }

    public function showTimes()
    {
        $times = Reservation::where('doctor_id', 2)
            ->orderBy('start_time')
            ->get();

        $all_slots = $this->makeTimes($times);
        $reserved_slots = Appointment::where('doctor_id', 2)->whereIn('appointment', $all_slots)->get()->toArray();
        $removed_slots = [];
        for ($i = 0; $i < count($reserved_slots); $i++) {
            array_push($removed_slots, $reserved_slots[$i]['appointment']);
        }
        $slots = array_diff($all_slots, $removed_slots);
        return $slots;
    }

    public function makeTimes($times)
    {
        $data = [];
        foreach($times as $index => $time) {
            $start_str = strtotime($time->start_time);
            $end_str = strtotime($time->end_time);

            while ($start_str < $end_str) {
                array_push($data, date('H:i:s', $start_str));
                $start_str = strtotime(date('H:i:s', $start_str + $time->waiting_time * 60));
            }
        }
        return $data;
    }

    protected function sendMessage($response)
    {
    	// set our post
    	$ch = curl_init('https://graph.facebook.com/v8.0/me/messages?access_token=' . setting('facebook_token'));
    	curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    	curl_exec($ch);
    	curl_close($ch);
    }

    protected function verifyAccess()
    {
    	// FACEBOOK_MESSENGER_WEBHOOK_TOKEN is not exist yet.
    	// we can set that up in our .env file
    	$local_token = env('FACEBOOK_MESSENGER_WEBHOOK_TOKEN');
    	$hub_verify_token = request('hub_verify_token');

    	// condition if our local token is equal to hub_verify_token
    	if ($hub_verify_token === $local_token) {
    		// echo the hub_challenge in able to verify.
    		echo request('hub_challenge');
    		exit;
    	}
    }

}
