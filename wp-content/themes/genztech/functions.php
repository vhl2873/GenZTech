<?php
// Tự động load tất cả controller
foreach (glob(get_template_directory() . '/controllers/*.php') as $controller) {
    require_once $controller;
}

// Tự động load tất cả model
foreach (glob(get_template_directory() . '/models/*.php') as $model) {
    require_once $model;
}
