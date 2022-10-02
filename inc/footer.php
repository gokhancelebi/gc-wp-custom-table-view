<?php

/*
 * footer actions
 *
 */
add_action('wp_footer', 'gc_custom_table_viewer_footer');

function gc_custom_table_viewer_footer(){
    ?>
    <style>
        #gc-table-search{
            width: 200px;

        }
        #table-search{
            background:#fff;
        }

        .gc-table-pagination .pagination{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .gc-table-pagination .pagination li{
            list-style: none;
        }

        .gc-table-pagination .pagination li a{
            text-decoration: none;
            color: #000;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .gc-table-pagination .pagination li a:hover{
            background: #ccc;
        }

        /** table styles **/

        .gc-custom-table{
            width: 100%;
        }

        .gc-custom-table thead tr th{
            text-align: center;
            padding: 7px;
            cursor: pointer;
        }

        .gc-custom-table tbody tr td{
            text-align: center;
            padding: 10px;
            vertical-align:middle;
        }
        /** table header styles **/
        .gc-custom-table thead tr th{
            background: #343a40;
            color:#fff;
        }
        .gc-custom-table thead tr th:first-child{
            border-top-left-radius: 5px;
        }
        .gc-custom-table thead tr th:last-child{
            border-top-right-radius: 5px;
        }

        .gc-custom-table tbody tr td:first-child{
            border-bottom-left-radius: 5px;
        }
        .gc-custom-table tbody tr td:last-child{
            border-bottom-right-radius: 5px;
        }
        .gc-custom-table .download{
            text-decoration: none!important;
            color: #e64a19;
            /*border: 1px solid #ccc;*/
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .gc-custom-table .download:hover{
            background: #ccc;
        }

        #table-content{
            max-width: 1200px;
            margin:0 auto;
            margin-top: 30px;
        }

        .gc-custom-table tbody tr{
            background-color: rgba(0,0,0,.05);
            background: #f8f8f8;
            border:solid 1px #e5e5e5
        }

        .gc-custom-table tbody tr:nth-child(odd){
            background-color: rgba(0,0,0,.05);
            background: #fff;
            border:solid 1px #e5e5e5
        }

    </style>
    <?php
}