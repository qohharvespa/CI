<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title;?> Desa&nbsp;<?=$data_uji->nama_desa;?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> <?=$subtitle?>&nbsp;
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-sm-6">
                        <table class="table table-condensed table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Rank</th>
                                    <th class="text-center">Euclidean Distance</th>
                                    <th class="text-center">Desa</th>
                                    <th class="text-center">Kesesuaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $clr = "bg-success";
                                $arab = array();
                                $robu = array();
                                foreach ($urutan_hasil->result() as $key) {
                                    if($no < 6){
                                        $into = array('kecocokan' => $key->kecocokan);
                                        // array_push($kumpulan, $into);
                                        if($key->kecocokan=="Kopi Arabica"){
                                            array_push($arab, $into);
                                        }elseif($key->kecocokan=="Kopi Robusta"){
                                            array_push($robu, $into);
                                        }
                                    }
                                    ?>
                                    <tr class="<?=($no < 6) ? $clr : '';?>">
                                        <td class="text-center"><?=$no;?></td>
                                        <td><?=round($key->hasil, 7);?></td>
                                        <td><?=$key->nama_desa?></td>
                                        <td><?='Cocok&nbsp;'.$key->kecocokan;?></td>

                                    </tr>
                                    <?php
                                    $no++;
                                }

                                ?>      
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        $result = "";
                        $jum = 0;
                        if(count($robu) > count($arab)){
                            $result = "Kopi Robusta";
                            $jum = count($robu);
                        }elseif(count($arab) > count($robu)){
                            $result = "Kopi Arabica";
                            $jum = count($arab);
                        }
                        ?>
                        <h3>Hasil Uji Menyatakan bahwa Kopi Yang Cocok Adalah<br><b><?=$result;?></b></h3>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-inverse" onclick="window.location.assign('<?=base_url('data_uji')?>')">Kembali</button>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.col-lg-8 -->
        
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<!-- Modal -->
