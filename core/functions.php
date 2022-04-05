<?php
function getFromRequest($param_name){
    return $_REQUEST [$param_name] ?? null;
}