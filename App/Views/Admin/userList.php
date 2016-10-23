<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Üyeler</h4>
                        <p class="category">Üyeler Listesi</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>Ad Soyad</th>
                            <th>E-Posta</th>
                            <th>Rütbe</th>
                            <th>İşlem</th>
                            </thead>
                            <tbody>
                            <?php
                                if($uyeler){
                                    foreach($uyeler as $yaz) {
                                        $rutbe = ($yaz["rutbe"] == 3 ? 'Yönetici' : ($yaz["rutbe"] == 2 ? 'Editör' : ($yaz["rutbe"] == 1 ? 'Üye': 'Engellendi')));
                                        echo '<tr>
                                            <td>' . stripslashes($yaz["adSoyad"]) . '</td>
                                            <td>' . stripslashes($yaz["email"]) .'</td>
                                            <td>' . $rutbe . '</td>
                                            <td>
												<a href="'.$siteUrl.'admin/users/duzenle/'.$yaz["uyeID"].'/"><i class="fa fa-edit"></i></a>
										';		
										if($yaz["uyeID"]!=1) echo '<a onclick="return confirm(\'Silmek istediğinizden emin misiniz?\')" href="'.$siteUrl.'admin/users/sil/'.$yaz["uyeID"].'/"><i class="fa fa-remove"></i></a>';
										echo '</td>
                                        </tr>';
                                    }
                                }else echo '<tr><td colspan="4">Henüz hiç üye yok</td></tr>';
                            ?>
                             </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>