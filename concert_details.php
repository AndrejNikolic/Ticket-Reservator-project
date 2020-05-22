<?php
  session_start();
  require_once("connect.php");

  $idItem = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Concert</title>
</head>
<body>
  <?php include "assets/header.php" ?>
  <div class="container my-5 concert">
    <div class="row">
      <?php
        $sql = "SELECT concert.id_concert, title, description, image, start_date, price_ticket, price_vip, num_ticket, num_vip, SUM(quantity), SUM(quantity_vip) FROM concert INNER JOIN ticket ON concert.id_concert=ticket.id_concert WHERE concert.id_concert=?";
        $exc = $con->prepare($sql);
        $exc->bind_param("i", $idItem);
        $exc->execute();
        $exc->bind_result($id, $title, $desc, $image, $start_date, $price_ticket, $price_vip, $num_ticket, $num_vip, $bought_ticket, $bought_vip);

        $exc->fetch();

        $ticket_left = $num_ticket - $bought_ticket;
        $vip_left = $num_vip - $bought_vip;
      ?>
      <div class="col-md-6">
        <h1 class="text-right"><?php echo $title; ?></h1>
        <img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode( $image ); ?>" alt="">
      </div>
      <div class="col-md-6">
        <h3 class="h3_fix">
          <span><?php echo date("H:m", strtotime($start_date)); ?></span>
          <span><?php echo date("d. M Y.", strtotime($start_date)); ?></span>
        </h3>
        <p><?php echo $desc; ?></p>
        <div class="row">
          <div class="col-md-6">
            <div class="order-ticket">
              <h4>Ticket</h4>
              <h2 class="price">$<?php echo $price_ticket; ?></h2>
              <div class="ticket_quantity">
                <span class="tickets-left"><strong><?php echo $ticket_left; ?></strong> tickets left</span>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-outline-secondary btn-minus">-</button>
                  <input type="number" name="ticket_qty" min=0 max=<?php echo $ticket_left; ?> class="qty" value=0>
                  <button type="button" class="btn btn-outline-secondary btn-plus">+</button>
                </div>
              </div>
              <a href="#" class="btn btn-primary btn-lg">ORDER NOW</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="order-ticket vip">
              <h4>VIP Ticket</h4>
              <h2 class="price">$<?php echo $price_vip; ?></h2>
              <div class="ticket_quantity">
                <span class="tickets-left"><strong><?php echo $vip_left; ?></strong> tickets left</span>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-outline-secondary btn-minus-vip">-</button>
                  <input type="number" name="vip_qty" min=0 max=<?php echo $vip_left; ?> class="qty-vip" value=0>
                  <button type="button" class="btn btn-outline-secondary btn-plus-vip">+</button>
                </div>
              </div>
              <a href="#" class="btn btn-info btn-lg">ORDER NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>