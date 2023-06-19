<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Welcome To <?php echo $this->session->flashdata('customer_name'); ?></h3>

            <p>Hi <?php echo $this->session->flashdata('customer_name'); ?>, You Successfully Registration Our Site
                Go Your Login <a href="<?php echo base_url('customer/login') ?> "><b><?php echo $this->session->flashdata('customer_email'); ?></b></a>
            </p>

        </div>
        <div class="clear"></div>
    </div>
</div>