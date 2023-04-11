<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodolistController extends Controller
{
  public function home() {
  
    return view("welcome", ["listItems" => ListItem::where("is_completed", 0)->get()]);
  }

  public function saveItem(Request $request) {
    $newListItem = new ListItem;
    $newListItem->name = $request->listItem;
    $newListItem->is_completed = 0;
    $newListItem->save();

    return redirect("/");
  }  

  public function markComplete(string $id) {
    $foundListItem = ListItem::find($id);
    $foundListItem->is_completed = 1;
    $foundListItem->save();

    return redirect("/");
  }

  public function deleteItem(string $id) {
    $foundItem = ListItem::find($id);
    $foundItem->delete();

    return redirect("/");
  }
}
