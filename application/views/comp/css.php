    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5b64b15bc3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?=base_url()?>assets/js/tailwind.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <style>
.related {
  transition: transform .2s; /* Animation */
  cursor: pointer;
  border-radius: 12px;

}

.related:hover {
  transform: scale(1.07); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
<style>


 /* line-clamp */
 .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }

    #table_raffles_filter {
        color: #FFF;
    }

    #table_raffles_length option {
        color:#000;
    }

    #table_raffles_length {
        color: #FFF;
    }

    #table_raffles_info {
        color: #FFF;
    }

    .paginate_button .current {
        color:#FFF;
    }
    #table_raffles_previous {
        color:#FFF;
    }

    #table_raffles_next {
        color:#FFF;
    }
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #1c1c27;
  margin: 2% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #1c1c27;
  width: 70%; /* Could be more or less, depending on screen size */
}

@media (max-width: 900px) {
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #1c1c27;
  margin: 5% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #1c1c27;
  width: 90%; /* Could be more or less, depending on screen size */
}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: white;
  text-decoration: none;
  cursor: pointer;
}
</style>

    <style>
        .swal-button {
            padding: 7px 19px;
            border-radius: 2px;
            background-color: #ffbd0a;
            font-size: 12px;
            border: 1px solid #ffbd0a;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
        }

        .swal-button:not([disabled]):hover {

            background-color: #ffbd0a;
            border: 1px solid #ffbd0a;
        }
        .swal-button::hover {

            background-color: #ffbd0a;
            border: 1px solid #ffbd0a;
        }

        #sideNav::-webkit-scrollbar {
            display: none;
        }

       
    </style>
 