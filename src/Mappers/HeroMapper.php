<?php

class HeroMapper
{
    public static function mapToObject(array $datas): Hero
    {
        return new Hero(
            $datas['id'],
            $datas['name'],
            $datas['hp'],
            $datas['attack'],
            $datas['skin_path']
        );
    }
}