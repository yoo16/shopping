<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Models\Item;

class UserItem extends Model
{
    protected $table = 'user_items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'item_id',
        'amount',
        'price',
        'tax',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected static $session_key = 'user_items';

    static public function sessionValues(Request $request)
    {
        $values = [];
        if ($request->session()->has(self::$session_key)) {
            $values = $request->session()->get(self::$session_key);
        }
        return $values;
    }

    static public function sessionValue(Request $request)
    {
        $values = UserItem::sessionValues($request);
        if (isset($values[$request->id])) {
            return $values[$request->id];
        }
    }

    static public function saveSession(Request $request, UserItem $user_item)
    {
        $values = UserItem::sessionValues($request);
        $values[$user_item->item_id] = $user_item;
        $request->session()->put(self::$session_key, $values);
    }

    static public function addCart(Request $request, User $user, Item $item)
    {
        $user_item = UserItem::sessionValue($request);
        $amount = (isset($user_item->amount)) ? $user_item->amount + 1 : 1;
        UserItem::updateCart($request, $user, $item, $amount);
    }

    static public function updateCart(Request $request, User $user, Item $item, $amount)
    {
        $user_item = UserItem::sessionValue($request);
        if (!$user_item) $user_item = new UserItem();
        $user_item->item_id = $item->id;
        $user_item->user_id = $user->id;
        $user_item->price = $item->price;
        $user_item->amount = $amount;

        UserItem::saveSession($request, $user_item);
    }

    static public function updatesCart(Request $request, User $user)
    {
        if (empty($posts = $request->all())) return;
        if (empty($amounts = $posts[self::$session_key])) return;
        foreach ($amounts as $item_id => $amount) {
            if ($amount > 0) {
                $item = Item::find($item_id);
                UserItem::updateCart($request, $user, $item, $amount);
            }
        }
    }

    static public function removeCart(Request $request, User $user, Item $item)
    {
        if (empty($item)) return;
        if (!$request->session()->has(self::$session_key)) return;

        $user_items = $request->session()->get(self::$session_key);
        if (isset($user_items[$item->id])) {
            unset($user_items[$item->id]);
            $request->session()->put(self::$session_key, $user_items);
        }
        return $user_items;
    }

    static public function clearCart(Request $request)
    {
        $request->session()->forget(self::$session_key);
    }

    static public function calculateTotal(Request $request)
    {
        $user_items = UserItem::sessionValues($request);
        $total_price = 0;
        if (empty($user_items)) return $total_price;
        foreach ($user_items as $user_item) {
            $total_price+= ($user_item->price * $user_item->amount);
        }
        return $total_price;
    }


}
