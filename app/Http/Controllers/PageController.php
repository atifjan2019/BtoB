<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function menu()
    {
        $menu = $this->menuData();

        return view('menu', compact('menu'));
    }

    public function order()
    {
        $menu = $this->menuData();

        return view('order', compact('menu'));
    }

    private function menuData(): array
    {
        return [
            ['title' => 'To Begin', 'note' => 'Chaat & Small Plates', 'items' => [
                ['name' => 'Papdi Chaat',     'desc' => 'Crisp wafers, spiced chickpeas, tamarind, mint & sweet yoghurt', 'price' => '£9',  'badge' => 'Veg',       'badgeColor' => '#7aa06b', 'img' => '1559528896-c5310744cce8'],
                ['name' => 'Amritsari Fish',  'desc' => 'Ajwain-battered market fish, kachumber, burnt-lime aioli',      'price' => '£12', 'badge' => 'Spicy',     'badgeColor' => '#c46a4a', 'img' => '1768179669433-bd9d52949c20'],
                ['name' => 'Keema Pav',       'desc' => 'Bombay lamb keema, buttered brioche pav, crisp onion',          'price' => '£11', 'badge' => 'Signature', 'badgeColor' => '#c9a24b', 'img' => '1742599361498-79824d24e355'],
                ['name' => 'Tandoori Broccoli','desc' => 'Charred florets, makhani glaze, toasted almond',              'price' => '£10', 'badge' => 'Veg',       'badgeColor' => '#7aa06b', 'img' => '1601050690597-df0568f70950'],
            ]],
            ['title' => 'From the Tandoor', 'note' => 'Clay Oven', 'items' => [
                ['name' => 'Malai Chicken Tikka', 'desc' => 'Cream cheese, cardamom & white pepper marinade',      'price' => '£16', 'badge' => 'Mild',      'badgeColor' => '#7aa06b', 'img' => '1742599361498-79824d24e355'],
                ['name' => 'Seekh Kebab',          'desc' => 'Hand-minced lamb, ginger, green chilli, smoked over coals', 'price' => '£17', 'badge' => 'Spicy', 'badgeColor' => '#c46a4a', 'img' => '1768179669433-bd9d52949c20'],
                ['name' => 'Tandoori King Prawns',  'desc' => 'Ajwain & yoghurt, burnt butter, lime',             'price' => '£24', 'badge' => 'Signature', 'badgeColor' => '#c9a24b', 'img' => '1559528896-c5310744cce8'],
            ]],
            ['title' => 'The Mains', 'note' => 'Curries & Biryani', 'items' => [
                ['name' => 'Hyderabadi Dum Biryani', 'desc' => 'Saffron basmati, lamb or chicken, sealed & baked on dum', 'price' => '£22', 'badge' => 'Signature', 'badgeColor' => '#c9a24b', 'img' => '1559528896-c5310744cce8'],
                ['name' => 'Old Delhi Butter Chicken','desc' => 'Tandoori chicken, tomato, fenugreek, cream',            'price' => '£19', 'badge' => 'Favourite', 'badgeColor' => '#c9a24b', 'img' => '1742599361498-79824d24e355'],
                ['name' => 'Rogan Josh',              'desc' => 'Slow-braised lamb shank, Kashmiri chilli, clove',       'price' => '£23', 'badge' => 'Spicy',     'badgeColor' => '#c46a4a', 'img' => '1768179669433-bd9d52949c20'],
                ['name' => 'Paneer Makhani',           'desc' => 'House paneer, silky makhani, kasoori methi',           'price' => '£17', 'badge' => 'Veg',       'badgeColor' => '#7aa06b', 'img' => '1601050690597-df0568f70950'],
                ['name' => 'Goan Prawn Curry',         'desc' => 'Coconut, tamarind, kokum, curry leaf',                 'price' => '£21', 'badge' => 'Coastal',   'badgeColor' => '#7a94a0', 'img' => '1559528896-c5310744cce8'],
            ]],
            ['title' => 'Breads & Rice', 'note' => 'From the Tandoor', 'items' => [
                ['name' => 'Truffle Garlic Naan', 'desc' => 'Blistered naan, black truffle, roasted garlic butter', 'price' => '£7', 'badge' => 'Signature', 'badgeColor' => '#c9a24b', 'img' => '1504674900247-0877df9cc836'],
                ['name' => 'Laccha Paratha',       'desc' => 'Flaky, layered whole-wheat paratha',                  'price' => '£5', 'badge' => 'Veg',       'badgeColor' => '#7aa06b', 'img' => '1504674900247-0877df9cc836'],
                ['name' => 'Saffron Pilau',         'desc' => 'Basmati, saffron, whole spice',                      'price' => '£6', 'badge' => 'Veg',       'badgeColor' => '#7aa06b', 'img' => '1504674900247-0877df9cc836'],
            ]],
            ['title' => 'To Finish', 'note' => 'Desserts', 'items' => [
                ['name' => 'Gulab Jamun Brûlée', 'desc' => 'Warm gulab jamun, cardamom custard, caramel crack', 'price' => '£9', 'badge' => 'Signature', 'badgeColor' => '#c9a24b', 'img' => '1559528896-c5310744cce8'],
                ['name' => 'Kulfi Falooda',       'desc' => 'Pistachio kulfi, rose, vermicelli, basil seed',    'price' => '£8', 'badge' => 'Chilled',   'badgeColor' => '#7a94a0', 'img' => '1742599361498-79824d24e355'],
            ]],
        ];
    }

    public function about()   { return view('about'); }
    public function gallery() { return view('gallery'); }
    public function events()  { return view('events'); }
    public function reserve() { return view('reserve'); }
    public function contact() { return view('contact'); }
}
