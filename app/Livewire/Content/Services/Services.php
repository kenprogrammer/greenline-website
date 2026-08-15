<?php

namespace App\Livewire\Content\Services;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;

    public $search='';

    public function render()
    {
        $posts = $this->search 
                ? Post::where('title', 'like', '%' . $this->search . '%')->where('post_type','service')->paginate(10)
                : Post::where('post_type','service')->paginate(10);

        return view('livewire.content.services.services', ['posts' => $posts]);
    }

    /**
     * Delete post 
     */
    public function delete($id)
    {
        try{
            $post = Post::findOrFail($id);

            $imagePath = 'media/posts/' . $post->assoc_image;

            // Delete image
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Delete database record
            $post->delete();

            session()->flash('success', 'Service deleted successfully!');

            return $this->redirect('/admin/services', navigate: true);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            session()->flash('error', 'Service not found.');

        } catch (\Exception $e) {

            \Log::error('Service deletion failed', [
                'id' => $id,
                'error' => $e->getMessage()
            ]);

            session()->flash('error', 'Unable to delete service. Please try again.');
        }
    }

    /**
     * Publish post 
     */
    public function publish($id)
    {
        $post = Post::find($id);
        $post->published = true;

        if($post->save()){
            session()->flash('success', 'Post published successfully!');
        }else{
            session()->flash('error', 'Unable to publish post. Please try again!');
        }
    }

    /**
     * Unpublish post 
     */
    public function unpublish($id)
    {
        $post = Post::find($id);
        $post->published = false;

        if($post->save()){
            session()->flash('success', 'Post unpublished successfully!');
        }else{
            session()->flash('error', 'Unable to unplish post. Please try again!');
        }
    }
}
