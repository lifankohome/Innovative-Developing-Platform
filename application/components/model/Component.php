<?php
/**
 * Created by PhpStorm.
 * User: lifanko  lee
 * Date: 2017/8/2
 * Time: 11:49
 */
namespace app\components\model;

use think\Model;
use think\Db;

class Component extends Model
{
    //数据表名称
    protected $table = 'component';

    public static function search($keyWord)
    {
        $list = Db::table('component')
            ->where('name|attribute|packing', 'LIKE', $keyWord . '%')
            ->select();
        $result = "<table class='table table-striped table-bordered table-hover'>
                    <tr><th>ID</th><th>元件名</th><th>型号</th><th>封装</th><th>剩余数量</th>
                    <th>借出</th><th>损坏</th><th>押金/个</th><th>元件位置</th></tr>";
        $num = 0;
        foreach ($list as $row) {
            $price = round($row['price'], 2);

            $result .= "<tr>";
            $result .= "<td>{$row['id']}</td>";
            $result .= "<td>{$row['name']}</td>";
            $result .= "<td>{$row['attribute']}</td>";
            $result .= "<td>{$row['packing']}</td>";
            $result .= "<td>{$row['num']}</td>";
            $result .= "<td>{$row['lend']}</td>";
            $result .= "<td>{$row['damage']}</td>";
            $result .= "<td>￥$price</td>";
            $result .= "<td>{$row['location']}</td>";
            $result .= "</tr>";
            $num++;
        }
        if ($num) {
            $result .= "<span class='tipText'>完成：搜索到 " . $num . " 条记录</span>";
        } else {
            $result .= "<span class='tipText'>完成：无匹配结果</span>";
        }
        $result .= "</table>";
        return $result;
    }
}