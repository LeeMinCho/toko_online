<div class="mt-5">
    <?php if ($this->session->flashdata("type") == "success") : ?>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?= $this->session->flashdata("message"); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <h5><strong>Total: </strong>Rp<?= number_format($this->cart->total(), 0, ',', '.'); ?></h5>
    <form action="<?= base_url("Home/updateCart"); ?>" method="post">
        <div class="table-responsive">
            <table class="table wy-table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->cart->contents() as $value) : ?>
                        <tr>
                            <td><?= $value["name"]; ?></td>
                            <td><?= number_format($value["price"], 0, ',', '.'); ?></td>
                            <td>
                                <input type="number" name="<?= $value["rowid"]; ?>" value="<?= $value["qty"]; ?>">
                                <a class='btn btn-danger ml-2' href="<?= base_url("Home/removeCart/" . $value["rowid"]); ?>">
                                    <i class='fas fa-trash'></i> Remove
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <button class="btn btn-primary">
            <i class="fas fa-save"></i> Save Cart
        </button>
    </form>
</div>