<?php


namespace App\Services\Impl;


use App\Models\Promotion\Banner;
use App\Models\Promotion\Promotion;
use App\Services\PromotionService;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PromotionServiceImpl implements PromotionService
{
    public function getAll()
    {
        return Promotion::with('banner')->orderBy('id')->paginate(5);
    }

    public function get($id)
    {
        $promotion = Promotion::with('banner')->findOrFail($id);

        $promotion->data = json_decode($promotion->data);

        return $promotion;
    }

    public function store(Request $request)
    {
        if ($files = $request->file('image_banner')) {
            $file_banner_name    =  uniqid().'.'.File::extension($request->file('image_banner')->getClientOriginalName());
            $file_structure_name =  uniqid().'.'.File::extension($request->file('image_structure')->getClientOriginalName());

            $path_banner         = 'banners/'.$file_banner_name;
            $path_structure      = 'structure/'.$file_structure_name;
            $full_structure_path = '/uploads/'.$path_structure;

            Storage::disk('local')->put($path_banner, File::get($request->file('image_banner')));
            Storage::disk('local')->put($path_structure, File::get($request->file('image_structure')));

            $promotion = new Promotion();
            $banner    = new Banner();

            $structure_list = [];

            $structure_title = $request->title_list_main;
            foreach ($request->list_title as $index => $title)
            {
                if ($title && $request->list_text[$index]) {
                    $structure_list[] = [
                        'title' => $title,
                        'text'  => $request->list_text[$index]
                    ];
                }
            }

            $structure = [
                'image' => $full_structure_path,
                'title' => $structure_title,
                'list'  => $structure_list,
            ];

            $promotion->fill($request->only([
                'active',
                'from',
                'to'
            ]));

            $promotion->data = json_encode($structure);

            $promotion->save();

            $banner->title        = $request->title;
            $banner->image        = '/uploads/'.$path_banner;
            $banner->promotion_id = $promotion->id;

            $banner->save();
        }
    }

    public function update(Request $request, $id)
    {
        $promotion           = Promotion::findOrFail($id);
        $decoded_structure   = json_decode($promotion->data);
        $full_structure_path = $decoded_structure->image;

        $promotion->fill($request->only([
            'active',
            'from',
            'to'
        ]));

        $structure_list = [];

        $structure_title = $request->title_list_main;
        foreach ($request->list_title as $index => $title)
        {
            if ($title && $request->list_text[$index]) {
                $structure_list[] = [
                    'title' => $title,
                    'text'  => $request->list_text[$index]
                ];
            }
        }

        if ($files = $request->hasFile('image_structure')) {
            $oldFileStructure    = public_path().json_decode($promotion->data)->image;
            $file_structure_name =  uniqid().'.'.File::extension($request->file('image_structure')->getClientOriginalName());

            $path_structure      = 'structure/'.$file_structure_name;
            $full_structure_path = '/uploads/'.$path_structure;

            Storage::disk('local')->put($path_structure, File::get($request->file('image_structure')));

            if(File::exists($oldFileStructure)) {
                File::delete($oldFileStructure);
            }
        }

        $structure = [
            'image' => $full_structure_path,
            'title' => $structure_title,
            'list'  => $structure_list,
        ];

        $promotion->data = json_encode($structure);

        $promotion->save();

        $promotion->banner->title = $request->title;

        if ($files = $request->hasFile('image_banner')) {
            $oldFileBanner = public_path().$promotion->banner->image;
            $filename      = uniqid().'.'.File::extension($request->file('image_banner')->getClientOriginalName());
            $path          = 'banners/'.$filename;


            Storage::disk('local')->put($path, File::get($request->file('image_banner')));

            if(File::exists($oldFileBanner)) {
                File::delete($oldFileBanner);
            }

            $promotion->banner->image = '/uploads/'.$path;
        }

        $promotion->banner->save();


    }

    public function delete($id)
    {
        $promotion = Promotion::findOrFail($id);

        $promotion->delete();
    }

    public function html_to_obj($html) {
        $dom = new DOMDocument();
        $dom->loadHTML($html);
        return $this->element_to_obj($dom->documentElement);
    }

    public function element_to_obj($element) {
        $obj = array( "tag" => $element->tagName );
        foreach ($element->attributes as $attribute) {
            $obj[$attribute->name] = $attribute->value;
        }
        foreach ($element->childNodes as $subElement) {
            if ($subElement->nodeType == XML_TEXT_NODE) {
                $obj["html"] = $subElement->wholeText;
            }
            else {
                $obj["children"][] = $this->element_to_obj($subElement);
            }
        }
        return $obj;
    }
}
