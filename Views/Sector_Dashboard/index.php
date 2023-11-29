<?php header_dashboard($data); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#main">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $data["page_name"]; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">

                        <?php if (Permisos::create()) : ?>
                            <a class="btn btn-primary" href="<?= base_url ?>/Sector_Dashboard/nuevo" role="button"><?= SITE_ICON_NEW ?>Nuevo Sector</a>
                        <?php endif; ?>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2">
                                    <?= Alertas::mostrarAlerta(); ?>
                                    <div id="resp"></div>

                                </div>
                            </div>
                        </div>


                        <!-- Table with stripped rows -->
                        <table id="table" class="display table nowrap responsive">
                            <thead>
                                <tr>
                                    <th scope="col"># ID</th>
                                    <th scope="col">Lugar</th>
                                    <th scope="col">Calle</th>
                                    <th scope="col">Altura</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sectores as $sector) : ?>
                                    <tr>
                                        <td><?php echo $sector->ID; ?></td>
                                        <td><?php echo $sector->Lugar; ?></td>
                                        <td><?php echo $sector->Calle; ?></td>
                                        <td><?php echo $sector->Altura; ?></td>
                                        <td>
                                            <a type='button' class='editarfnt btn btn-warning btn-sm me-1' href="<?= base_url ?>/Sector_Dashboard/editar/<?= $sector->ID; ?>">Editar</a>
                                            <button id="SectorData" data-idsector='<?= $sector->ID; ?>' data-namesector='<?= $sector->Lugar; ?>' type='button' class='btn btn-danger btn-sm' onclick="eliminarFnt(this)" >Eliminar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->

<?php footer_dashboard($data); ?>