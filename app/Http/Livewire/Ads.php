<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Ad;


class Ads extends Component
{
    public $ads, $ad_id, $serial, $name, $site, $expire, $category;
    public $isModalOpen = 0;

    public function render()
    {
        $this->ads = Ad::all();
        return view('livewire.ads.table');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->serial = '';
        $this->name = '';
        $this->site = '';
        $this->expire = '';
        $this->category = '';
    }

    public function store()
    {
        $this->validate([
            'serial' => 'required',
            'name' => 'required',
            'site' => 'required',
            'expire' => 'required',
            'category' => 'required',
        ]);

        Ad::updateOrCreate(['id' => $this->ad_id], [
            'serial' => $this->serial,
            'name' => $this->name,
            'site' => $this->site,
            'expire' => $this->expire,
            'category' => $this->category,
        ]);

        session()->flash('message', $this->ad_id ? 'Ad updated.' : 'Ad created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $this->ad_id = $id;
        $this->name = $ad->name;
        $this->site = $ad->site;
        $this->expire = $ad->expire;
        $this->category = $ad->category;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Ad::find($id)->delete();
        session()->flash('message', 'Ad deleted.');
    }
}
