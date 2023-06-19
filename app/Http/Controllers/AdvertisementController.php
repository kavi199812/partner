<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\AdvertisementSubImage;
use App\Models\Category;
use App\Models\District;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Mockery\Exception;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (empty(auth('partner')->user()->id)) {
            return view("errors/404");
        }
        $categories = Category::query()
            ->get();
        $districts = District::query()
            ->get();

        return view('partner/add-advertisement',compact('categories','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty(auth('partner')->user()->id)) {
            return view("errors/404");
        }
        
        try {
            $advertisement['post_id'] = IdGenerator::generate(['table'=>'advertisements','field'=>'post_id','length'=>8,'prefix'=>'PID12']);
            $advertisement['partner_id'] = auth('partner')->user()->id;
            $advertisement['post_name'] = $request->input('advertisement-name');
            $advertisement['contact_num'] = $request->input('contact-number');
            $advertisement['description'] = $request->input('description');
            $post_catagories = $request->input('categories');
            foreach ($post_catagories as $post_catagory){
                $advertisement['category_id'] = $post_catagory;
            }
            $district_ids = $request->input('district');
            foreach ($district_ids as $district_id ){
                $advertisement['district_id'] = $district_id;
            }

            //Save main image
            $img_path = $request ->file('image');
            $imgName = time().'.'.$img_path->extension();
            $img_path->move(public_path('images'),$imgName);
            $advertisement['main_image'] = $imgName;

            //save sub images
            $newImages = array();
            $images = $request->file('images');
            $imgNameCode = intval( IdGenerator::generate(['table' => 'advertisements', 'field' => 'sub_images', 'length' => 8, 'prefix' => 1]));
            foreach ($images as $image) {
                $imgNameCode++;
                $advertisementImgName = $imgNameCode . '.' . $image->extension();
                $image->move(public_path('images'), $advertisementImgName);
                $newImages[] = $advertisementImgName;
            }
            $advertisement['sub_images'] = implode("|", $newImages);

            //save Details in Advertisment table
            $newAdvertisment = Advertisement::create($advertisement);

            if ($newAdvertisment){
                dd("Done");
            }
            else{
                dd("error");
            }
        }
        catch (Exception $exception){
            dd($exception);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
