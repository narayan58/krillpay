<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\AdminFaq;
use Modules\Admin\Entities\AdminEvent;
use Modules\Admin\Entities\AdminPages;
use Modules\Admin\Entities\AdminPosts;
use App\Mail\TestEmail;
use Modules\Admin\Entities\Newsletter;
use Modules\Admin\Entities\AdminValue;
use Modules\Admin\Entities\AdminBranch;
use Modules\Admin\Entities\AdminTeam;
use Modules\Admin\Entities\AdminSlider;
use Modules\Admin\Entities\AdminCategory;
use Modules\Admin\Entities\AdminContact;
use Modules\Admin\Entities\AdminCountry;
use Modules\Admin\Entities\AdminService;
use Modules\Admin\Entities\AdminPartner;
use Modules\Admin\Entities\AdminWorking;
use Modules\Admin\Entities\AdminFeature;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Entities\AdminWhyChoose;
use Modules\Admin\Entities\AdminUniversity;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\AdminCertificate;
use Mail;
use Modules\Admin\Entities\AdminStudyAbroad;
use Modules\Admin\Entities\AdminTestimonial;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $testimonials = AdminTestimonial::where('status', 1)->get();
        $posts = AdminTestimonial::where('status', 1)->get();
        $partners = AdminPartner::where('status', 1)->get();
        $services = AdminService::where('status', 1)->get();
        $features=AdminFeature::where('status',1)->get();

        $sliders = AdminSlider::where('status', 1)->get();
        $study_abroad = AdminStudyAbroad::where('status', 1)->get();
        $why_choose = AdminWhyChoose::where('status', 1)->get();
        $why_we_are_different = AdminPages::where('slug', 'why-we-are-different')->first();
        $workings = AdminWorking::where('status', 1)->get();
        $testimonial = AdminTestimonial::where('status', 1)->get();
        $certificates = AdminCertificate::where('status', 1)->get();
        $events = AdminEvent::where('status', 1)->get();
        $universities = AdminUniversity::where('status', 1)->get();
        $news = AdminPosts::where('status', 1)->get();

        $countries = AdminCountry::get();
        $faqs = AdminFaq::get();
        $result = array(
            'page_header'   =>  'Financial inclusion for the unbanked',
            'services'   =>  $services,
            'features'   =>  $features,
            'partners'   =>  $partners,
            'sliders'   =>  $sliders,
            'testimonials'  => $testimonials,
            'study_abroad'   =>  $study_abroad,
            'why_choose'   =>  $why_choose,
            'why_we_are_different'   =>  $why_we_are_different,
            'workings'   =>  $workings,
            'testimonial'   =>  $testimonial,
            'certificates'   =>  $certificates,
            'events'   =>  $events,
            'universities'   =>  $universities,
            'news'   =>  $news,
            'countries'   =>  $countries,
            'faqs'   =>  $faqs,
        );
        return view('frontend::index', $result);
    }

    public function appointment()
    {
        $result = array(
            'page_header'   =>  'Book an Appointment',
        );
        return view('frontend::appointment', $result);
    }

    public function about()
    {
        $values = AdminValue::where('status', 1)->get();
        $teams = AdminTeam::where('status', 1)->get();
        $aboutus = AdminPages::where('slug','about-us')->first();
        $aboutus1 = AdminPages::where('id','7')->first();
        $result = array(
            'page_header'   =>  'About Us',
            'values'        =>  $values,
            'aboutus'       =>  $aboutus,
            'teams'         => $teams,
            'aboutus1'     => $aboutus1,
        );
        return view('frontend::about',$result);
    }

    public function contact()
    {
        $news = AdminPosts::where('status', 1)->get();
        $result = array(
            'page_header'   =>  'Contact us',
            'news'          =>  $news,
        );
        return view('frontend::contact', $result);
    }

    public function postContact(Request $request){
        if (!empty($request->all())) {
            $validator = Validator::make($request->all(),[
                'name'          => 'required',
                'email'         => 'required',
                'message'       => 'required',
                'phone'       => 'required',
            ]);
            if ($validator->passes()) {
                $crud = new AdminContact;
                $crud->name = $request->name;
                $crud->email = $request->email;
                $crud->message = $request->message;
                $crud->phone = $request->phone;
                $crud->service = $request->service;
                $crud->viewed = '0';
                $crud->status = '1';
                $crud->save();
                if ($crud) {
                     $arrayName = array(
                        'name'              => $crud->name,
                        'email'             => $crud->email,
                        'crud'               => $crud,
                        'subject'           => 'Contact us message.',
                        );
                    Mail::send('frontend::email.contact', $arrayName, function ($m) use ($arrayName) {
                    $mail_from = env('MAIL_USERNAME', 'adhikarin641@gmail.com');
                    $m->from($mail_from, 'KrillPay');
                    $m->to('emmanuel@krillpay.com')
                    ->subject($arrayName['subject']);
                    });
                }
                // Store your user in database
                $result = array(
                    'error'     => false,
                    'message'   => "Thank you for contacting with us !",
                );

                return response()->json($result,200);
            }else{
                $result = array(
                    'error'     => true,
                    'errors'    => $validator->errors()
                );
                return response()->json($result,200);
            }
        }else{
            $result = array(
                'error'     => true,
                'errors'    => 'Unauthorized Access',
            );
            return response()->json($result,200);
        }
    }

    public function pageDetail($slug)
    {
        $detail = AdminPages::where('status', 1)->where('slug', $slug)->first();
        if($detail){
            $result = array(
                'page_header'   =>  $detail->title,
                'detail'   =>  $detail,
            );
            return view('frontend::pagedetail', $result);
        }else{
            return view('frontend::404');
        }
    }

    public function universities()
    {
        $countries = AdminCountry::with('universities')->where('status', 1)->get();
        $result = array(
            'page_header'   =>  'Universities we Represent',
            'countries'   =>  $countries,
        );
        return view('frontend::universities', $result);
    }

    public function universityDetail($slug)
    {
        $detail = AdminUniversity::where('status', 1)->where('slug', $slug)->first();
        if($detail){
            $result = array(
                'page_header'   =>  $detail->title,
                'detail'   =>  $detail,
            );
            return view('frontend::university-detail', $result);
        }else{
            return view('frontend::404');
        }
    }

    public function studyAbroad($slug)
    {
        $detail = AdminStudyAbroad::where('status', 1)->where('slug', $slug)->first();
        $testimonial = AdminTestimonial::where('status', 1)->get();
        $universities = AdminUniversity::where('status', 1)->get();

        if($detail){
            $result = array(
                'page_header'   =>  $detail->title,
                'detail'   =>  $detail,
                'testimonial'   =>  $testimonial,
                'universities'   =>  $universities,
            );
            return view('frontend::study-abroad', $result);
        }else{
            return view('frontend::404');
        }
    }

    public function whyChoose()
    {
        $list = AdminWhyChoose::where('status', 1)->get();
        $result = array(
            'page_header'   =>  'Why Choose Us',
            'list'   =>  $list,
        );
        return view('frontend::why-choose', $result);
    }

    public function testimonial()
    {
        $list = AdminTestimonial::where('status', 1)->get();
        $result = array(
            'page_header'   =>  'Testimonial',
            'list'   =>  $list,
        );
        return view('frontend::testimonial', $result);
    }

    public function faq()
    {
        $list = AdminFaq::where('status', 1)->get();
        $result = array(
            'page_header'   =>  'FAQs',
            'list'   =>  $list,
        );
        return view('frontend::faq', $result);
    }

    public function terms()
    {

        $result = array(
            'page_header'   =>  'Terms And Conditions',

        );
        return view('frontend::terms', $result);
    }

    public function events()
    {
        $list = AdminEvent::where('status', 1)->get();
        $result = array(
            'page_header'   =>  'Events',
            'list'   =>  $list,
        );
        return view('frontend::events', $result);
    }

    public function scholarshipOffers()
    {
        $list = AdminCountry::whereHas('scholarshipOffers', function($q){
            $q->where('valid_till', '<=', date('Y-m-d'));
        })->where('status', 1)->get();
        $result = array(
            'page_header'   =>  'Scholarship Offers',
            'list'   =>  $list,
        );
        return view('frontend::scholarship-offers', $result);
    }

    public function branches()
    {
        $list = AdminBranch::where('status', 1)->get();
        $result = array(
            'page_header'   =>  'Branch',
            'list'   =>  $list,
        );
        return view('frontend::branch', $result);
    }

    public function emailSubscription(Request $request)
    {
        $sent = $request->all();
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'thanks' => ['required', 'string'],
        ];
        $validator = Validator::make($sent, $rules);
        if ($validator->fails())
            return response()->json(['status' => false, 'error' => $validator->errors()], 400);
        $names = explode(' ', $request->name);
//        API
        $apiKey = config('services.sendgrid_api_key');
//        $urlQuery = 'https://api.sendgrid.com/v3/marketing/contacts';
//        $response = \Http::withToken($apiKey)->acceptJson()->put($urlQuery, [
////            'list_ids' => ['krill_pays'],
//            'contacts' => json_encode([
//                'email' => $request->email,
//                'first_name' => data_get($names, 0),
//                'last_name' => data_get($names, 1)
//            ])
//        ])->json();
//        $urlQuery = 'https://api.sendgrid.com/v3//marketing/contacts/imports/1d8194ac-5ef2-4eff-87f7-f471d01d7dfd';
//        $response = \Http::withToken($apiKey)->acceptJson()->get($urlQuery)->json();
//        dd($response);


        $send_grid = new \SendGrid($apiKey);
        $request_body = json_decode(
            '{
                        "contacts": [
                            {
                                "email": "'. $request->email .'",
                                "first_name": "'. data_get($names, 0) .'",
                                "last_name": "'. data_get($names, 1) .'"
                            }
                        ]
                    }'
                , true);
        try {
            $response = $send_grid->client->marketing()->contacts()->put($request_body);
            if ($response->statusCode() > 299) {
                $msg = "Sorry I can't process your inputs. Something is wrong.";
                return response()->json([
                    'status' => false, 'error' => $validator->errors()->add('email', $msg)], 400);
            }
            else {
//            Store data
                $crud = new Newsletter;
                $crud->name = $request->name;
                $crud->email = $request->email;
                $crud->status = '1';
                $crud->save();
                return response()->json([
                    'status' => true,
                    'url' => $sent['thanks'], 'msg' => $response->statusCode(),
                ]);
            }
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'error' => $validator->errors()->add('email', $ex->getMessage())], 400);
        }
//        return
    }

    public function newsLetter(Request $request){
        if (!empty($request->all())) {
            $validator = Validator::make($request->all(),[
                'name'          => 'required',
                'email'         => 'required',
            ]);
            if ($validator->passes()) {
                $crud = new Newsletter;
                $crud->name = $request->name;
                $crud->email = $request->email;
                $crud->status = '1';
                $crud->save();



                /*$email = new \SendGrid\Mail\Mail();
                $email->setFrom("adhikarin641@gmail.com", "Example User");
                $email->setSubject("Sending with SendGrid is Fun");
                $email->addTo("adhikarin641@gmail.com", "Example User");
                $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
                $email->addContent(
                    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
                );
                $sendgrid = new \SendGrid('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');
                try {
                    $response = $sendgrid->send($email);
                    print $response->statusCode() . "\n";
                    print_r($response->headers());
                    print $response->body() . "\n";
                } catch (Exception $e) {
                    echo 'Caught exception: '. $e->getMessage() ."\n";
                }*/



                // Store your user in database

                //sendgrid
                /*$address = "adhikarin641@gmail.com";
                $subject = "Test send grid";
                $name = "Narayan Adhikari";
                $final = $this->view('frontend::email.test-contact')
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject);*/
        /*            $data [] = '';
                    Mail::send('frontend::email.test-contact', $data, function ($message) {

        $message->from ('adhikarin641@gmail.com', 'Just Laravel' );

        $message->to ('adhikarin641@gmail.com')->subject ('Just Laravel demo email using SendGrid');
    } );
*/


/*                    Mail::to('adhikarin641@gmail.com')->send(new TestEmail());
*/


                $result = array(
                    'error'     => false,
                    'message'   => "We've received your email. Thank You !!!",
                );

                return response()->json($result,200);
            }else{
                $result = array(
                    'error'     => true,
                    'errors'    => $validator->errors()
                );
                return response()->json($result,200);
            }
        }else{
            $result = array(
                'error'     => true,
                'errors'    => 'Unauthorized Access',
            );
            return response()->json($result,200);
        }
    }
    /*public function newsLetter(Request $request){

        if (!empty($request->all())) {
            $validator = Validator::make($request->all(),
                [
                    'email'             => 'required|email|unique:tbl_newsletter_list,email',
                    'name'              => 'required',
                ],
                [
                    'email.unique'       => 'Email has already been registered',
                    'email.required'       => 'Email is required',
                ]
            );
            if ($validator->passes()) {
                $newsletter = new Newsletter;
                $newsletter->email = $request->email;
                $newsletter->name = $request->name;
                $newsletter->status = '1';
                $newsletter->save();
                // Store your user in database
                $result = array(
                    'error'     => false,
                    'message'   => "We've received your email. Thank You !!!",
                );

                return response()->json($result,200);
            }else{
                $result = array(
                    'error'     => true,
                    'errors'    => $validator->errors()->first()
                );
                return response()->json($result,200);
            }
        }else{
            $result = array(
                'error'     => true,
                'errors'    => 'Unauthorized Access',
            );
            return response()->json($result,200);
        }
    }*/
}
