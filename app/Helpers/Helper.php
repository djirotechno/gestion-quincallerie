
<?php


use App\Models\Commande;
use App\Models\Product;


class Helper{

    public static function geststock($rqt){
        $prod =  \DB::table('products')->get();
            foreach($prod as $stk){
                    if($rqt > $stk->qt){
                        return true;
                    }else{
                        return false;
                    }
            }

    }

    public static function updateStock($commande, $produit)
    {
        foreach($produit as $prod){
            foreach($commande as $cmd){
                $product = Product::find($cmd->idprod);
                $product->qt = $product->qt - $cmd->qt;
                $product->update();
            }
        }
        
    }
}