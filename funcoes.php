<?php


function calc_delta($a_vlr, $b_vlr, $c_vlr)
{
  $delta_ret = ($b_vlr * $b_vlr) - (4 * $a_vlr * $c_vlr);

  return $delta_ret;
}

function calc_x1($a_vlr, $b_vlr, $delta_vlr)
{
  $x1_ret = (-$b_vlr + sqrt($delta_vlr)) / (2 * $a_vlr);

  return $x1_ret;
}

function calc_x2($a_vlr, $b_vlr, $delta_vlr)
{
  $x2_ret = (-$b_vlr - sqrt($delta_vlr)) / (2 * $a_vlr);

  return $x2_ret;
}

function calc_bhaskara($a_vlr, $b_vlr, $c_vlr)
{
  if($a_vlr == 0) {

    return NULL;
  }

  $ret = array();
  $ret['delta'] = calc_delta($a_vlr, $b_vlr, $c_vlr);

  if($ret['delta'] < 0)   {
      $ret['x1'] = NULL;
      $ret['x2'] = NULL;

      return $ret;

  } else if($ret['delta'] == 0) {
    $ret['x1'] = calc_x1($a_vlr, $b_vlr, $ret['delta']);
    $ret['x2'] = NULL;

    return $ret;
  } else {
    $ret['x1'] = calc_x1($a_vlr, $b_vlr, $ret['delta']);
    $ret['x2'] = calc_x2($a_vlr, $b_vlr, $ret['delta']);
  }

  return $ret;
}


function get_insert_sql($a, $b, $c, $delta, $x1, $x2)
{
  $query = "insert into dados(a, b, c, delta, x1, x2) values ('$a','$b','$c','$delta','$x1', '$x2')";
  return($query);
}

function connect_and_write_db($a, $b, $c, $delta, $x1, $x2){
  $conn = mysqli_connect('localhost', 'root', '', 'bhaskara');

  $query = get_insert_sql($a, $b, $c, $delta, $x1, $x2);

  $result = mysqli_query($conn, $query);
}

 ?>