<?php

namespace App\Livewire\Content\Banners;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class ListBanners extends Component
{
    use WithPagination;

    public function render()
    {
        $banners = Banner::paginate(10);

        return view('livewire.content.banners.list-banners',['banners'=>$banners]);
    }

    /**
     * Delete banner 
     */
    public function delete($id)
    {
        try{
            $banner = Banner::find($id);

            if(!empty($banner)){
                 $imagePath = 'media/banners/' . $banner->assoc_image;

                // Delete image
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }

                // Delete database record
                $banner->delete();

                session()->flash('success', 'Banner deleted successfully!');

                return $this->redirect('/admin/banners', navigate: true);
            }else{
                session()->flash('error', 'Unable to retrieve banner details. Please try again!');
            }

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            session()->flash('error', 'Banner not found.');

        } catch (\Exception $e) {

            \Log::error('Banner deletion failed', [
                'banner_id' => $banner_id,
                'error' => $e->getMessage()
            ]);

            session()->flash('error', 'Unable to delete banner. Please try again!');
        }
    }

    /**
     * Publish banner 
     */
    public function publish($id)
    {
        $banner = Banner::find($id);
        $banner->published = true;

        if($banner->save()){
            session()->flash('success', 'Banner published successfully!');
        }else{
            session()->flash('error', 'Unable to publish banner. Please try again!');
        }
    }

    /**
     * Unpublish banner 
     */
    public function unpublish($id)
    {
        $banner = Banner::find($id);
        $banner->published = false;

        if($banner->save()){
            session()->flash('success', 'Banner unpublished successfully!');
        }else{
            session()->flash('error', 'Unable to unplish banner. Please try again!');
        }
    }
}
