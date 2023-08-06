<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customerinfo;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    public function addProduct(Request $req){
       
           
       
       
        $totalnumber = $req->totalItems;
        $prodName="Xyzproduct";
        $price ="10";
        $Qty ="01";
        $name = $req->name;
        if($name == null){
             
             return redirect()->back()->with('name' ,'please enter name');
            }
        $desc=$req->desc;
        if($desc == null){
              
              return redirect()->back()->with('description' ,'please enter description');
             }
        $address = $req->address;
        if($address == null){
              
              return redirect()->back()->with('address' ,'please enter address');
             }
             $country = $req->country;
        if($country == null){
              
              return redirect()->back()->with('country' ,'please select country');
             }
        
        $state = $req->state;
        if($state == null){
              
              return redirect()->back()->with('state' ,'please enter state');
             }
             $city = $req->city;
        if($city == null){
              
              return redirect()->back()->with('city' ,'please enter city');
             }
        
        $zipcode =$req->zipcode;
        if($zipcode == null){
              
              return redirect()->back()->with('zipcode' ,'please enter zipcode');
             }
        $newdata = json_decode($req->data);
       if(count($newdata) == 1){
        
        return redirect()->back()->with('prodMsg' ,'product empty. Please add products');
       }
       
         array_shift($newdata);

 $customerInfo =  customerinfo::create(["name"=>$name,"description"=>$desc,"address"=>$address,"country"=>$country,"state"=>$state,"city"=>$city,"zipcode"=>$zipcode]);
 foreach ($newdata as $dats) {
    $customerInfo->items()->create(["productName"=>$dats[1],"price"=>$dats[2],"quantity"=>$dats[3]]);
       
    }

// for ($i=0; $i < $totalnumber ; $i++) { 
 
//     $customerInfo->items()->create(["productName"=>$prodName,"price"=>$price,"quantity"=>$Qty]);
// }
return redirect()->back()->with('message' ,'Thank you for your purchase.We will deliver your product to the given address');

    }
}
