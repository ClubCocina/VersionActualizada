<div class="col-xs-10 col-xs-offset-1">
    <div id="header-panel" class="centerbox SueEllen mayus">
        <div id="mi-panel" class="mayus">MI PANEL</div>
        <div class="menu-panel-item col-xs-12 col-sm-3 <?= $this->router->method == 'reservas' ? 'activo' : ''; ?>">
            <a href="<?= base_url('mipanel/reservas') ?>">RESERVAS</a>
        </div>
        <div class="menu-panel-item col-xs-12 col-sm-3 <?= $this->router->method == 'perfil' ? 'activo' : ''; ?>">
            <a href="<?= base_url('mipanel/perfil') ?>">PERFIL</a>
        </div>
        <div class="menu-panel-item col-xs-12 col-sm-3 <?= $this->router->method == 'inbox' ? 'activo' : ''; ?>">
            <a href="<?= base_url('mipanel/inbox') ?>">INBOX</a>
            <?php if ($this->session->userdata('tipoUsuario') == 2): ?>
                <ul><li class="submenu-panel-item"><a href="<?= base_url('mipanel/msjesParaChef'); ?>">Msjes. Clientes</a></li></ul>
            <?php endif; ?>
        </div>
        <div class="menu-panel-item col-xs-12 col-sm-3 <?= $this->router->method == 'calificaciones' ? 'activo' : ''; ?>">
            <a href="<?= base_url('mipanel/calificaciones') ?>">CALIFICACIONES</a>
            <?php if ($this->session->userdata('tipoUsuario') == 2): ?>
                <ul><li class="submenu-panel-item"><a href="<?= base_url('mipanel/comentarios') ?>">Com. Clientes</a></li></ul>
            <?php endif; ?>
        </div>
        <!--ul class="menu-panel">
            <li class="menu-panel-item <?= $this->router->method == 'reservas' ? 'activo' : ''; ?>"><a href="<?= base_url('mipanel/reservas') ?>">RESERVAS</a></li>
            <li class="menu-panel-item separador-menu <?= $this->router->method == 'perfil' ? 'activo' : ''; ?>"><a href="<?= base_url('mipanel/perfil') ?>">PERFIL</a></li>
            <li class="menu-panel-item separador-menu <?= $this->router->method == 'inbox' ? 'activo' : ''; ?>">
                <a href="<?= base_url('mipanel/inbox') ?>">INBOX</a>
                <?php if ($this->session->userdata('tipoUsuario') == 2): ?>
                    <ul><li class="submenu-panel-item"><a href="<?= base_url('mipanel/msjesParaChef'); ?>">Msjes. Clientes</a></li></ul>
                <?php endif; ?>
            </li>
            <li class="menu-panel-item separador-menu <?= $this->router->method == 'calificaciones' ? 'activo' : ''; ?>">
                <a href="<?= base_url('mipanel/calificaciones') ?>">CALIFICACIONES</a>
                <?php if ($this->session->userdata('tipoUsuario') == 2): ?>
                    <ul><li class="submenu-panel-item"><a href="<?= base_url('mipanel/comentarios') ?>">Com. Clientes</a></li></ul>
                <?php endif; ?>
            </li>
        </ul-->
    </div>
</div>