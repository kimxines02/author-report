<?php author_report_manager_scripts(); ?>

<div class="container-fluid">
  <div class="row row-full-mid">
    <div>
      <h1 class="h-title">Author Report Manager</h1>
    </div>
    <div class="row">
      <div class="mr-2">
        <button type="button" class="btn btn-primary v-center mr-2" data-bs-toggle="modal" data-bs-target="#addAuthorModal" id="addAuthorModalBtn">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-square pr-2" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
          Add Record
        </button>
      </div>

      <div>
        <button type="button" class="btn btn-success v-center" data-bs-toggle="modal" data-bs-target="#importAuthorModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cloud-arrow-up pr-2" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
          </svg>
          Import Author
        </button>
      </div>

    </div>
    
  </div>
  
  <?php include(plugin_dir_path(__FILE__) . 'add-author.php'); ?>
  <table id="tableDisplay" class="display text-sm" style="width:100%">
    <thead>
        <tr>
            <th>Author Name</th>
            <th>Book Title</th>
            <th>Category</th>
            <th>ISBN</th>
            <th>Format</th>
            <th>Retail Price</th>
            <th>Printing Cost, Taxes</th>
            <th>Units Sold</th>
            <th>Royalty</th>
            <th>Payment Method</th>
            <th>Payment Info</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($authors as  $author) : ?>
       <tr>
         <td><?php echo $author->author_id; ?></td>
         <td><?php echo $author->book_id; ?></td>
         <td><?php echo $author->category; ?></td>
         <td><?php echo $author->isbn; ?></td>
         <td><?php echo $author->format_s; ?></td>
         <td><?php echo $author->retail_price; ?></td>
         <td><?php echo $author->printing_cost; ?></td>
         <td><?php echo $author->units_sold; ?></td>
         <td><?php echo $author->royalty; ?></td>
         <td><?php echo $author->user_payment_method; ?></td>
         <td><?php echo $author->payment_info; ?></td>
         <td>
          <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg>
          </a>
          <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </a>
          <a href="" class="delete-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg>
          </a>
         </td> 
       </tr>
       <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
          <th>Author Name</th>
          <th>Book Title</th>
          <th>Category</th>
          <th>ISBN</th>
          <th>Format</th>
          <th>Retail Price</th>
          <th>Printing Cost, Taxes</th>
          <th>Units Sold</th>
          <th>Royalty</th>
          <th>Payment Method</th>
          <th>Payment Info</th>
          <th>Action</th>
        </tr>
    </tfoot>
</table>
</div>
