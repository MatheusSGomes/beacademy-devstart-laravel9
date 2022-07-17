<?php

function formatDateTime($dataTime)
{
  return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dataTime)->format('d/m/Y - H:i');
}

function formatMoney($money)
{
  $clean_money = str_replace('.', '', $money);
  return "R$ ". number_format($clean_money, 2, ',', '.');
}