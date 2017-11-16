<?php

// Home
Breadcrumbs::register('inbox', function ($breadcrumbs) {
    $breadcrumbs->push('Inbox', route('inbox'));
});
