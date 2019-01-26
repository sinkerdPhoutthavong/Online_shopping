<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
</head>
<body>
    <font face="phetsarath OT">
    <table width='700px'>
            <tr><td>&nbsp;</td></tr>
            <tr><td><img style="width:239px;" src="{{asset('images/frontend_images/home/logo1.png')}}"></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><font face="phetsarath OT">ສະບາຍດີທ່ານ {{$name}}!</font></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><font face="phetsarath OT">ຂໍສະແດງຄວາມຂອບໃຈສໍາລັບການໃຊ້ບໍລິການເວັບໄຊ E-Com SMSHOPPER ພວກເຮົາໃນການຊື້ສິນຄ້າຂອງທ່ານ</font> </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><font face="phetsarath OT">ລາຍລະອຽດຂອງການສັ່ງຊື້ຂອງທ່ານມີດັ່ງລຸ່ມນີ້: </font></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><font face="phetsarath OT">ເລກທີການສັ່ງຊື້: {{$order_id}}</font></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table width='95%' cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                    <tr bgcolor="#cccccc">
                        <td><font face="phetsarath OT">ຊື່ສິນຄ້າ</font></td>
                        <td><font face="phetsarath OT">ລະຫັດສິນຄ້າ</font></td>
                        <td><font face="phetsarath OT">ຂະໜາດ</font></td>
                        <td><font face="phetsarath OT">ສີ</font></td>
                        <td><font face="phetsarath OT">ຈໍານວນ</font></td>
                        <td><font face="phetsarath OT">ຫົວໜ່ວຍລາຄາຕໍ່ 1</font></td>
                    </tr>
                    @foreach ($productDetails['orders'] as $product)
                        <tr>
                            <td><font face="phetsarath OT">{{$product['product_name']}}</font></td>
                            <td><font face="phetsarath OT">{{$product['product_code']}}</font></td>
                            <td><font face="phetsarath OT">{{$product['product_size']}}</font></td>
                            <td><font face="phetsarath OT">{{$product['product_color']}}</font></td>
                            <td><font face="phetsarath OT">{{$product['product_qty']}}</font></td>
                            <td><font face="phetsarath OT">
                                <?php
                                                    $price_amount = $product['product_price'];
                                                    //use for split yaek array
                                                    $totals = preg_split('//', $price_amount, -1, PREG_SPLIT_NO_EMPTY);
                                                                        // print_r($totals);
                                                                        //count index in array
                                                                        $countArray = count($totals) ;
                                                                        // echo $countArray;
                                                                        if($countArray==8){
                                                                            echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4].".".$totals[5].$totals[6].$totals[7];
                                                                        }
                                                                        elseif ($countArray==7) {
                                                                            echo $totals[0].".".$totals[1].$totals[2].$totals[3].".".$totals[4].$totals[5].$totals[6];
                                                                        }
                                                                        elseif ($countArray==6) {
                                                                            echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5];
                                                                        }
                                                                        elseif ($countArray==5) {
                                                                            echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4];
                                                                        }elseif ($countArray==4) {
                                                                            echo $totals[0].".".$totals[1].$totals[2].$totals[3];
                                                                        } 
                                                                                    
                                            ?><font face="phetsarath OT"> ກິບ</font>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                            <td colspan="5" align="right"><font face="phetsarath OT"> ຄ່າຂົນສົ່ງ (+)</font></td>
                            <td><?php 
                                $shippingCharge = $productDetails['shipping_charges'];
                                //use for split yaek array
                                $totals = preg_split('//', $shippingCharge, -1, PREG_SPLIT_NO_EMPTY);
                                // print_r($totals);
                                //count index in array
                                $countArray = count($totals) ;
                                // echo $countArray;

                                if($countArray==8){
                                    echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4].".".$totals[5].$totals[6].$totals[7];
                                }
                                elseif($countArray==9){
                                    echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5].".".$totals[6].$totals[7].$totals[8];
                                }
                                elseif ($countArray==7) {
                                    echo $totals[0].".".$totals[1].$totals[2].$totals[3].".".$totals[4].$totals[5].$totals[6];
                                }
                                elseif ($countArray==6) {
                                    echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5];
                                }
                                elseif ($countArray==5) {
                                    
                                    echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4];
                                }
                        ?><font face="phetsarath OT"> ກິບ</font></td>
                    </tr>
                    <tr>
                            <td colspan="5" align="right"><font face="phetsarath OT"> ສ່ວນຫຼຸດທີ່ໄດ້ຮັບຈາກ Coupon (-)</font></td>
                            <td><?php 
                                $Coupon = $productDetails['coupon_amount'];
                                //use for split yaek array
                                $totals = preg_split('//', $Coupon, -1, PREG_SPLIT_NO_EMPTY);
                                // print_r($totals);
                                //count index in array
                                $countArray = count($totals) ;
                                // echo $countArray;

                                if($countArray==8){
                                    echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4].".".$totals[5].$totals[6].$totals[7];
                                }
                                elseif($countArray==9){
                                    echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5].".".$totals[6].$totals[7].$totals[8];
                                }
                                elseif ($countArray==7) {
                                    echo $totals[0].".".$totals[1].$totals[2].$totals[3].".".$totals[4].$totals[5].$totals[6];
                                }
                                elseif ($countArray==6) {
                                    echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5];
                                }
                                elseif ($countArray==5) {
                                    
                                    echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4];
                                }
                        ?><font face="phetsarath OT"> ກິບ</font></td>
                    </tr>
                    <tr>
                            <td colspan="5" align="right"><font face="phetsarath OT"> ລວມລາຄາສິນຄ້າທັງໝົດ</font></td>
                            <td> <?php 
                                $Grand_total = $productDetails['grand_total'];
                                //use for split yaek array
                                $totals = preg_split('//', $Grand_total, -1, PREG_SPLIT_NO_EMPTY);
                                // print_r($totals);
                                //count index in array
                                $countArray = count($totals) ;
                                // echo $countArray;

                                if($countArray==8){
                                    echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4].".".$totals[5].$totals[6].$totals[7];
                                }
                                elseif($countArray==9){
                                    echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5].".".$totals[6].$totals[7].$totals[8];
                                }
                                elseif ($countArray==7) {
                                    echo $totals[0].".".$totals[1].$totals[2].$totals[3].".".$totals[4].$totals[5].$totals[6];
                                }
                                elseif ($countArray==6) {
                                    echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5];
                                }
                                elseif ($countArray==5) {
                                    
                                    echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4];
                                }
                        ?><font face="phetsarath OT"> ກິບ</font></td>
                    </tr>
                </table>
            </td></tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td width="50%">
                                <table>
                                    <tr>
                                        <td><font face="phetsarath OT"><strong>ຜູ່ຊື້ສິນຄ້າ:-</strong></font></td>
                                    </tr>
                                    <tr>
                                            <td><font face="phetsarath OT">ຊື່: {{$userDetails['name']}}</font></td>
                                        </tr>
                                        <tr>
                                                <td><font face="phetsarath OT">ບ້ານ: {{$userDetails['address']}}</font></td>
                                            </tr>
                                            <tr>
                                                    <td><font face="phetsarath OT">ເມືອງ: {{$userDetails['city']}}</font></td>
                                                </tr>
                                                <tr>
                                                        <td><font face="phetsarath OT">ແຂວງ: {{$userDetails['state']}}</font></td>
                                                    </tr>
                                                    <tr>
                                                            <td><font face="phetsarath OT">ປະເທດ: {{$userDetails['country']}}</font></td>
                                                        </tr>
                                                        <tr>
                                                                <td><font face="phetsarath OT">ລະຫັດໄປສະນີ: {{$userDetails['pincode']}}</font></td>
                                                            </tr>
                                                            <tr>
                                                                    <td><font face="phetsarath OT">ເບີໂທລະສັບ: {{$userDetails['mobile']}}</font></td>
                                                                </tr>
                                </table>
                            </td>
                            <td width="50%">
                                    <table>
                                            <tr>
                                                <td><font face="phetsarath OT"> <strong>ສົ່ງໃຫ້:-</font></strong></td>
                                            </tr>
                                            <tr>
                                                    <td><font face="phetsarath OT">ຊື່: {{$productDetails['name']}}</font></td>
                                                </tr>
                                                <tr>
                                                        <td><font face="phetsarath OT">ບ້ານ:{{$productDetails['address']}}</font></td>
                                                    </tr>
                                                    <tr>
                                                            <td><font face="phetsarath OT">ເມືອງ: {{$productDetails['city']}}</font></td>
                                                        </tr>
                                                        <tr>
                                                                <td><font face="phetsarath OT">ແຂວງ:{{$productDetails['state']}}</font></td>
                                                            </tr>
                                                            <tr>
                                                                    <td><font face="phetsarath OT">ປະເທດ: {{$productDetails['country']}}</font></td>
                                                                </tr>
                                                                <tr>
                                                                        <td><font face="phetsarath OT">ລະຫັດໄປສະນີ: {{$productDetails['pincode']}}</font></td>
                                                                    </tr>
                                                                    <tr>
                                                                            <td><font face="phetsarath OT">ເບີໂທລະສັບ: {{$productDetails['mobile']}}</font></td>
                                                                        </tr>
                                        </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><font face="phetsarath OT" >ຫາກທ່ານພົບບັນຫາ ກະລຸນາຕິດຕໍ່ທີ່ເບີ:<b> 021 213225, 020 77776521</b> </font></td></tr>
            <tr><td><font face="phetsarath OT" >ອີເມວ:<b> <a href="mailto:devn.info@gmail.com">devn.info@gmail.com</a></b> </font></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><font face="phetsarath OT">ຂໍຂອບໃຈ ແລະ ນັບຖືຢ່າງສູງ</font></td></tr>
            <tr><td><font face="phetsarath OT">ຈາກທີມງານ: ເວັບໄຊ</font><font face="times new roman"> E-com SMSHOPPER</font> </td></tr>
            <tr><td>&nbsp;</td></tr>
        </table>
    </font>
</body>
</html>