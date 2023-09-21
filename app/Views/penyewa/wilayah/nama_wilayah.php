<?= $this->extend('penyewa/layout/template-wilayah'); ?>

<?= $this->section('content'); ?>

<style>
    #map {
        height: 500px;
    }
</style>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="section-headline text-center">
                    <h2><?= $title; ?></h2>
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card border-0 shadow rounded-3 mb-5">
                            <div class="card-body p-4 p-sm-4">
                                <div class="form-group mb-2">
                                    <label for="Wilayah" style="font-weight:bold;margin-bottom:10px">Pilih Wilayah :</label><br>
                                    <?php foreach ($wilayah_gunung_anyar as $w) : ?>
                                        <a href="<?= base_url('wilayah/' . $w['NAMA_WILAYAH']) ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">Gunung Anyar</button></a>
                                    <?php endforeach; ?>
                                    <?php foreach ($wilayah_medokan_ayu as $w2) : ?>
                                        <a href="<?= base_url('wilayah/' . $w2['NAMA_WILAYAH']) ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">Medokan Ayu</button></a>
                                    <?php endforeach; ?>
                                    <a href="<?= base_url('wilayah') ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">Semua Wilayah</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12" id="map">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($wilayah as $w) : ?>
                                <div class="card mt-5 mx-auto" style="max-width:30rem;">
                                    <div class="card-body">
                                        <h6>
                                            <div class="card-header" style="background-color: #dadada;float:left;border: none"><?= $w['GENDER_KOS']; ?></div>
                                        </h6><br><br>
                                        <img class="card-img-top mb-3" src="<?= base_url() . "/upload/gambar_kos/" . $w['FILE_GAMBAR_KOS']; ?>">
                                        <h4 class="card-title" style="font-weight:bold"><?= $w['NAMA_KOS']; ?></h4>
                                        <h6 class="card-title" style="font-weight:bold">(<?= $w['ALAMAT_KOS']; ?>)</h6>
                                        <h6 class="card-text"><?= $w['NAMA_WILAYAH']; ?>, <?= $w['JARAK_RADIUS']; ?></h6><br>
                                        <h6 class="card-text" style="color:#949494"><?= $w['FASILITAS_KOS']; ?></h6>
                                    </div>
                                    <div class="mb-3" align="center">
                                        <a href="<?= base_url('detail-kos/' . $w['NAMA_KOS']) ?>"><button class="btn btn-dark" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">DETAIL KOS</button></a>
                                        <a href="<?= base_url('lihat-kamar/' . $w['NAMA_KOS']) ?>"><button class="btn btn-primary" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">LIHAT KAMAR</button></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php if ($w['NAMA_WILAYAH'] == 'Gunung Anyar') { ?>
        var map = L.map('map').setView([-7.339312794263156, 112.79285430908202], 14);
    <?php } else { ?>
        var map = L.map('map').setView([-7.324074714570759, 112.81113624572754], 14);
    <?php } ?>

    <?php foreach ($wilayah as $w) : ?>
        <?php if ($w['NAMA_WILAYAH'] == 'Gunung Anyar') { ?>
            L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);

            var marker = L.marker([<?= $w['LATITUDE_KOS'] ?>, <?= $w['LONGITUDE_KOS'] ?>]).addTo(map)
                .bindPopup('<b>Wilayah Gunung Anyar</b><br /><?= $w['NAMA_KOS']; ?>').openPopup();

            var circle = L.circle([<?= $w['LATITUDE_KOS'] ?>, <?= $w['LONGITUDE_KOS'] ?>], {
                color: 'red',
            }).addTo(map);

            var wilayahgununganyar = [
                [
                    [
                        -7.331853436324573,
                        112.7875006198883
                    ],
                    [
                        -7.33172574294642,
                        112.78387427330017
                    ],
                    [
                        -7.331512920568133,
                        112.77904629707336
                    ],
                    [
                        -7.331225610196106,
                        112.77136445045471
                    ],
                    [
                        -7.3313107392145485,
                        112.76895046234131
                    ],
                    [
                        -7.331214969067665,
                        112.76863932609558
                    ],
                    [
                        -7.33124689245225,
                        112.76836037635802
                    ],
                    [
                        -7.33167253736139,
                        112.76798486709595
                    ],
                    [
                        -7.331864077437772,
                        112.76782393455505
                    ],
                    [
                        -7.33197048855571,
                        112.767094373703
                    ],
                    [
                        -7.331885359663383,
                        112.76636481285095
                    ],
                    [
                        -7.3313958682167195,
                        112.76516318321228
                    ],
                    [
                        -7.331119198900172,
                        112.76415467262268
                    ],
                    [
                        -7.330885093959606,
                        112.76323199272156
                    ],
                    [
                        -7.3304275248568365,
                        112.75792121887207
                    ],
                    [
                        -7.336620629568518,
                        112.7546489238739
                    ],
                    [
                        -7.337525113595227,
                        112.7590262889862
                    ],
                    [
                        -7.33846151865048,
                        112.76450872421265
                    ],
                    [
                        -7.338227417571438,
                        112.76682615280151
                    ],
                    [
                        -7.3415048214671055,
                        112.76757717132567
                    ],
                    [
                        -7.341398412629028,
                        112.76869297027588
                    ],
                    [
                        -7.339397921734819,
                        112.76929378509521
                    ],
                    [
                        -7.341334567313957,
                        112.77742624282835
                    ],
                    [
                        -7.342100710489782,
                        112.77744770050049
                    ],
                    [
                        -7.342590190161053,
                        112.77940034866332
                    ],
                    [
                        -7.34467579315543,
                        112.77942180633545
                    ],
                    [
                        -7.345590901584793,
                        112.78420686721802
                    ],
                    [
                        -7.345207833169204,
                        112.78515100479126
                    ],
                    [
                        -7.344867327633756,
                        112.78633117675781
                    ],
                    [
                        -7.343994781008591,
                        112.78905630111694
                    ],
                    [
                        -7.344952454042071,
                        112.79141664505005
                    ],
                    [
                        -7.346293192822526,
                        112.79321908950804
                    ],
                    [
                        -7.346506008130008,
                        112.7960729598999
                    ],
                    [
                        -7.345867561901821,
                        112.79611587524414
                    ],
                    [
                        -7.345250396342796,
                        112.7971887588501
                    ],
                    [
                        -7.344888609237365,
                        112.79869079589844
                    ],
                    [
                        -7.345101425217394,
                        112.79916286468506
                    ],
                    [
                        -7.345633464721694,
                        112.79969930648804
                    ],
                    [
                        -7.345207833169204,
                        112.80092239379883
                    ],
                    [
                        -7.345952688118577,
                        112.80585765838623
                    ],
                    [
                        -7.34608037741314,
                        112.80613660812378
                    ],
                    [
                        -7.345803717228574,
                        112.80823945999146
                    ],
                    [
                        -7.346378318957745,
                        112.81272411346436
                    ],
                    [
                        -7.34373940118456,
                        112.81808853149414
                    ],
                    [
                        -7.343420176198213,
                        112.81963348388672
                    ],
                    [
                        -7.343335049496487,
                        112.82190799713135
                    ],
                    [
                        -7.343420176198213,
                        112.8249979019165
                    ],
                    [
                        -7.342951979136968,
                        112.82774448394774
                    ],
                    [
                        -7.334971271610796,
                        112.83031940460205
                    ],
                    [
                        -7.332332286166514,
                        112.82671451568602
                    ],
                    [
                        -7.330757400303804,
                        112.82598495483398
                    ],
                    [
                        -7.330416883709312,
                        112.82177925109862
                    ],
                    [
                        -7.330629706611374,
                        112.81332492828369
                    ],
                    [
                        -7.3313958682167195,
                        112.80680179595947
                    ],
                    [
                        -7.333396395082645,
                        112.79457092285156
                    ],
                    [
                        -7.331864077437772,
                        112.7876615524292
                    ]
                ]
            ]

            var polygon = L.polygon(wilayahgununganyar, {
                color: '#3ec1d5'
            }).addTo(map);

        <?php } else { ?>
            L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);

            var marker = L.marker([<?= $w['LATITUDE_KOS'] ?>, <?= $w['LONGITUDE_KOS'] ?>]).addTo(map)
                .bindPopup('<b>Wilayah Medokan Ayu</b><br /><?= $w['NAMA_KOS']; ?>').openPopup();

            var circle = L.circle([<?= $w['LATITUDE_KOS'] ?>, <?= $w['LONGITUDE_KOS'] ?>], {
                color: 'red',
            }).addTo(map);

            var wilayahmedokanayu = [
                [
                    [
                        -7.332183310715315,
                        112.78829455375671
                    ],
                    [
                        -7.332066258540118,
                        112.78796195983885
                    ],
                    [
                        -7.3259262967696435,
                        112.7881121635437
                    ],
                    [
                        -7.325521928899927,
                        112.79216766357422
                    ],
                    [
                        -7.32058435480152,
                        112.79109477996826
                    ],
                    [
                        -7.316561894115705,
                        112.80841112136841
                    ],
                    [
                        -7.316583177071914,
                        112.81238079071045
                    ],
                    [
                        -7.316838572467191,
                        112.81343221664429
                    ],
                    [
                        -7.316200083704912,
                        112.8137755393982
                    ],
                    [
                        -7.315668009038511,
                        112.81456947326659
                    ],
                    [
                        -7.3150508016307905,
                        112.81435489654541
                    ],
                    [
                        -7.314561291700549,
                        112.81469821929932
                    ],
                    [
                        -7.314178196598046,
                        112.81484842300415
                    ],
                    [
                        -7.314284611937279,
                        112.81542778015137
                    ],
                    [
                        -7.314007932002526,
                        112.81587839126585
                    ],
                    [
                        -7.313773818077631,
                        112.81620025634764
                    ],
                    [
                        -7.313475854722931,
                        112.81637191772461
                    ],
                    [
                        -7.312901210548673,
                        112.81686544418334
                    ],
                    [
                        -7.312496830871579,
                        112.81701564788818
                    ],
                    [
                        -7.312369131950101,
                        112.81768083572388
                    ],
                    [
                        -7.312177583499382,
                        112.81853914260863
                    ],
                    [
                        -7.311943468614698,
                        112.81879663467407
                    ],
                    [
                        -7.311070857508595,
                        112.81875371932983
                    ],
                    [
                        -7.3106239096963455,
                        112.81898975372314
                    ],
                    [
                        -7.310496210239262,
                        112.81956911087036
                    ],
                    [
                        -7.311475238477083,
                        112.8201913833618
                    ],
                    [
                        -7.3106239096963455,
                        112.82132863998413
                    ],
                    [
                        -7.310772892350139,
                        112.82192945480347
                    ],
                    [
                        -7.3121563003331165,
                        112.8231954574585
                    ],
                    [
                        -7.31283736115033,
                        112.8247833251953
                    ],
                    [
                        -7.31362483642514,
                        112.82604932785034
                    ],
                    [
                        -7.316242649650828,
                        112.8275728225708
                    ],
                    [
                        -7.317540909050499,
                        112.82989025115967
                    ],
                    [
                        -7.317647323587889,
                        112.8325080871582
                    ],
                    [
                        -7.3194989324753035,
                        112.83566236495972
                    ],
                    [
                        -7.319818174610157,
                        112.83576965332031
                    ],
                    [
                        -7.32192516696914,
                        112.83776521682739
                    ],
                    [
                        -7.322308255419412,
                        112.8376579284668
                    ],
                    [
                        -7.322670060875779,
                        112.8376579284668
                    ],
                    [
                        -7.323202127190018,
                        112.83602714538574
                    ],
                    [
                        -7.325053713013525,
                        112.83476114273071
                    ],
                    [
                        -7.328118389887637,
                        112.83328056335449
                    ],
                    [
                        -7.329182508872019,
                        112.83287286758423
                    ],
                    [
                        -7.331055352110406,
                        112.83259391784668
                    ],
                    [
                        -7.332587672538315,
                        112.83207893371582
                    ],
                    [
                        -7.335035117839004,
                        112.8303837776184
                    ],
                    [
                        -7.332481261567866,
                        112.82680034637451
                    ],
                    [
                        -7.331842795211119,
                        112.82641410827635
                    ],
                    [
                        -7.330757400303804,
                        112.8260064125061
                    ],
                    [
                        -7.3308425294117345,
                        112.82491207122803
                    ],
                    [
                        -7.330863811686185,
                        112.82368898391724
                    ],
                    [
                        -7.330438166004094,
                        112.82199382781982
                    ],
                    [
                        -7.330480730590603,
                        112.8198480606079
                    ],
                    [
                        -7.330736118024264,
                        112.81862497329712
                    ],
                    [
                        -7.330587142039102,
                        112.81589984893797
                    ],
                    [
                        -7.33065098889599,
                        112.81407594680786
                    ],
                    [
                        -7.3309276585034056,
                        112.8115439414978
                    ],
                    [
                        -7.331097916637934,
                        112.80916213989258
                    ],
                    [
                        -7.3313107392145485,
                        112.80720949172974
                    ],
                    [
                        -7.331544843931357,
                        112.8059434890747
                    ],
                    [
                        -7.3320343352142725,
                        112.80441999435425
                    ],
                    [
                        -7.332651519108394,
                        112.80023574829102
                    ],
                    [
                        -7.333396395082645,
                        112.79502153396606
                    ],
                    [
                        -7.333013316165819,
                        112.7916955947876
                    ],
                    [
                        -7.332162028503928,
                        112.78823018074036
                    ]
                ]
            ]

            var polygon = L.polygon(wilayahmedokanayu, {
                color: '#3ec1d5'
            }).addTo(map);
        <?php } ?>
    <?php endforeach; ?>
</script>

<?= $this->endSection(); ?>