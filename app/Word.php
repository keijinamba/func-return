<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MeCab_Tagger;

class Word extends Model
{
	// mecabで有効にする品詞ID
    private $posid_validation = array(38,41,42,43,44,45,46,47);


    public function analyzeSentence($str) {
        $res = array();
        $mecab = new \MeCab\Tagger();
        $obj = $mecab->parseToNode($str);

        foreach ($obj as $n) {
            $array = array(
                'word' => $n->getSurface(),
                'feature' => $n->getFeature()
            );
            array_push($res, $array);
        }
        
        return $res;
    }

    public function analyzeArticleSentence($str) {
    	$array = array();
        $mecab = new \MeCab\Tagger();
        $obj = $mecab->parseToNode($str);

        foreach ($obj as $n) {
            if (!in_array($n->getPosId(), $this->posid_validation)) continue;

            if (array_key_exists($n->getSurface(), $array)) {
                $array[$n->getSurface()] = $array[$n->getSurface()] + 1;
            } else {
                $array[$n->getSurface()] = 1;
            }
        }

        return $array;
    }
}
