
<h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
  Notifications <span class="badge bg-soft-primary badge-pill">2</span>
</h6>

<?php


    foreach ($alert_notif as $alert) {

?>


<div class="notification-menu" data-simplebar>
  <!-- item-->
  <a href="#" class="dropdown-item py-3">
    <small class="float-end text-muted ps-2"><?= $alert['date_notif']; ?></small>
    <div class="media">
      <div class="avatar-md bg-soft-primary">
        <i class="ti ti-chart-arcs"></i>
      </div>
      <div class="media-body align-self-center ms-2 text-truncate">
        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
        <small class="text-muted mb-0"><?= $alert['message']; ?></small>
      </div><!--end media-body-->
    </div><!--end media-->
  </a><!--end-item-->
</div>
<!-- All-->


<?php

    }

?>