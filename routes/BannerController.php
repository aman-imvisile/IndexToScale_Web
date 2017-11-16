<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use DB, Session, Redirect, Storage;
use App\Combos;
use App\Category;
use App\MenuItem;
use App\Setting;
use App\SelectionItem;
use App\PriceSizeWeight;

use App\Banner;
use App\CustomerMenu as CustomerSelection;
use App\Photo;

class BannerController extends Controller {

	/**
	 * Eloquent model
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
  protected $combo_item;
  protected $category;
  protected $menu_item;
  protected $setting;
  protected $selection_item;
  protected $price_size_weight;

  protected $banner;
  protected $customer_selection;
  protected $photo;

	public function __construct( 
    Banner $banner,
    CustomerSelection $customer_selection,
    Photo $photo,

    Combos $combo_item,
    Category $category,
    MenuItem $menu_item,
    Setting $setting,
    SelectionItem $selection_item,
    PriceSizeWeight $price_size_weight ) {

    $this->combo_item          = $combo_item;
    $this->category            = $category;
    $this->menu_item           = $menu_item;
    $this->setting             = $setting;
    $this->selection_item      = $selection_item;
    $this->price_size_weight   = $price_size_weight;

    $this->banner              = $banner;
    $this->customer_selection  = $customer_selection;
    $this->photo               = $photo;
	}


  /**
   * Create Banner
   */
	public function createBanner(Request $request) {

    $bannerBackgroundImage  = $request->file('banner_photo');
    $bannerBackgroundName   = ($request->hasFile('banner_photo'))?Storage::putFile('banner_background_photo', $bannerBackgroundImage):null;

   	$input_data = [
      'page'                  => $request->input('page'),
   		'type_of_design'			  => $request->input('type_of_design'),
      'bg_photo'              => $bannerBackgroundName,
   		'banner_text'	          => $request->input('banner_text')
   	];
    
   Session::flash('success','Record has been successfully added.');
	 return $this->banner->create( $input_data );

	}  

  /**
   * Update Selection
  */
  public function updateBanner(Request $request) {

    $id = $request->input('reference_id');
    $banner = $this->banner->find($id);
    
    $bannerBackgroundImage  = $request->file('edit_banner_photo');
    $bannerBackgroundName   = ($request->hasFile('edit_banner_photo'))?Storage::putFile('banner_background_photo', $bannerBackgroundImage):null;

    $input_data = [
      'page'                  => $request->input('edit_page'),
      'type_of_design'        => $request->input('edit_type_of_design'),
      'bg_photo'              => $bannerBackgroundName,
      'banner_text'           => $request->input('edit_banner_text')
    ];
    
   Session::flash('success','Record has been successfully updated.');
   return $this->banner->where('id', $id)->update( $input_data );
  }

  /**
   * Delete Combo
   */
  public function deleteBanner(Request $request) {
    
    $id = $request->input('reference_id');
    
    Session::flash('success','Record has been deleted.');
    return $this->banner->where('id','=',$id)->delete();

  }


  /**
   * Edit Banner
   */
  public function editBanner(Request $request) {
    
    $id = $request->input('reference_id');
    return $this->banner->find($id);

  }
  
  /**
   * Update banner by Item 
   */
  public function updateBannerByItem(Request $request) {

    $item_id = $request->input('item_id');
    $banner_id = $request->input('banner_id');

    $input_data = [
      'menu_item_id'           => $item_id
    ];
    
   Session::flash('success','Record has been successfully updated.');
   return $this->banner->where('id', $banner_id)->update( $input_data );
  }

  /**
   * Return All Banner
   */
  public function getBannerList(Request $request) {

    $data = $this->banner->orderBy('id', 'DESC')->get();
    $selections = $this->customer_selection->orderBy('id', 'DESC')->get();

    $res['banners']=[];
    $res['selections']=[];
    foreach( $data as $value ) {
      $selection = $this->customer_selection->find($value->page);

      $selection_detail = (count($selection)>0)?$selection:null;

      $bg_photo = $value->bg_photo;
      $banner_text = $value->banner_text;

      switch ($value->type_of_design) {
        case 'sales':
          $type='Sales';
          $item="byitem";
          break;
        case 'new':
          $type='New';
          $item="byitem";
          break;
        case 'recommendation':
          $type='Chefs Recommendation';
          $item="byitem";
          break;
        case 'promo_banner':
          $type='Promo Banner';
          $item=false;
          break;
        case 'banner_link_to_combo':
          $type='Banner link to combo item';
          $item="banner_link_to_combo";
          break;
        default:
          $item=false;
          $type='';
          break;
      }

      if($item == "byitem") {

        $item = '';
        $item = $this->menu_item->find( $value->menu_item_id );
        $item_photo_detail = $this->photo->where('menu_item_id', $value->menu_item_id)->orderBy('main', 'DESC')->first();

        $bg_photo = '';
        $banner_text = '';

        if(count($item) > 0) {
          $banner_text = $item->item_name;
        }

        if(count($item_photo_detail) > 0) {
          $bg_photo = $item_photo_detail->photos;
        }
      }

      if($item == "banner_link_to_combo") {

        $combo = '';
        $combo = $this->combo_item->find( $value->menu_item_id );

        $bg_photo = '';
        $banner_text = '';

        if(count($combo) > 0) {
          $banner_text = $combo->name;
        }

        if(count($combo) > 0) {
          $bg_photo = $combo->photo;
        }
      }

      $res['banners'][] = (object)[
        'id'                => $value->id,
        'page'              => $selection_detail,
        'type_of_design'    => $type,
        'type_of_design_code'=> $value->type_of_design,
        'bg_photo'          => $bg_photo,
        'banner_text'       => $banner_text,
        'menu_item_id'      => $value->menu_item_id
      ];  

    }

    foreach( $selections as $value ) {
      $res['selections'][] = (object)[
        'id'                  => $value->id,
        'custom_name'         => trim(html_entity_decode(strip_tags($value->custom_name))),
      ];
    }

    return view('admin.banner-list')->with('data', $res);
  
  }

  public function menuBannerPreview($id) {
    $value = $this->banner->find($id);

    $bg_photo = $value->bg_photo;
    $banner_text = $value->banner_text;

    if($value->type_of_design != "promo_banner") {

      if($value->type_of_design == "banner_link_to_combo") {

          $combo = '';
          $combo = $this->combo_item->find( $value->menu_item_id );

          $bg_photo = '';
          $banner_text = '';

          if(count($combo) > 0) {
            $banner_text = $combo->name;
          }

          if(count($combo) > 0) {
            $bg_photo = $combo->photo;
          }

      } else {

        $item = $this->menu_item->find($value->menu_item_id);
        $item_photo_detail = $this->photo->where('menu_item_id', $value->menu_item_id)->orderBy('main', 'DESC')->first();

        $bg_photo = '';
        $banner_text = '';

        if(count($item) > 0) {
          $banner_text = $item->item_name;
        }

        if(count($item_photo_detail) > 0) {
          $bg_photo = $item_photo_detail->photos;
        }

      }
    } 



    $data = (object)[
      'bg_photo'          => $bg_photo,
      'banner_text'       => $banner_text
    ];

    return view('admin.previews.banner.menu-banner-preview')->with(['data' => $data]);
  }
}
