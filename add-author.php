<div class="modal fade" id="addAuthorModal" tabindex="-1">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">New Author</h5>
    </div>
    <div class="modal-body">
    <form method="post" name="newAuthor" id="addAuthorModalForm">
      <div class="text-sm">
          <div class=" p-1">
            <div class="row mb-3">
              <label class="col form-label">Author Name</label>
              <select name="author_id" class="col-sm-8 form-select form-select-sm authors-list" >
                <option selected class="text-sm" disabled>Select Author</option>
                <?php foreach ($allUsers as  $user) : ?>
                  <option value="<?php echo $user->ID; ?>" class="text-sm"><?php echo $user->display_name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label class="col form-label">Book Title</label>
              <select name="book_id" class="col-sm-8 form-select form-select-sm books-list" >
                <option selected class="text-sm" disabled>Select Book</option>
                <?php foreach ($allBooks as  $book) : ?>
                  <option value="<?php echo $book->ID; ?>" class="text-sm"><?php echo $book->post_title; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label class="col form-label">Category</label>
              <select name="category" class="col-sm-8 form-select form-select-sm category-list" >
                <option selected disabled>Select Category</option>
                <option value="1">Direct Sales</option>
                <option value="2">Indirect Sales</option>
              </select>
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label class="col form-label">Select Quarter</label>
              <select name="quartercb" class="col-sm-8 form-select form-select-sm quarter-list" >
                <option selected disabled>Quarter</option>
                <option value="q1">1st Quarter</option>
                <option value="q2">2nd Quarter</option>
                <option value="q3">3rd Quarter</option>
              </select>
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label  class="col form-label">Date Published</label>
              <input type="date" name="date_published" class="col-sm-8 form-control form-control-sm" />
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label  class="col form-label">ISBN</label>
              <input type="text" name="isbn" class="col-sm-8 form-control form-control-sm" />
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label  class="col form-label">Format</label>
              <select name="format_s" class="col-sm-8 form-select form-select-sm category-list" >
                <option selected disabled>Select Format</option>
                <option value="1">E-Book</option>
                <option value="2">Paperback</option>
                <option value="3">Hardback</option>
                <option value="4">Audiobook</option>
              </select>
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label  class="col form-label">Retail Price</label>
              <input type="text" name="retail_price" class="col-sm-8 form-control form-control-sm" />
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label  class="col form-label">Printing Cost, Taxes</label>
              <input type="text" name="printing_cost" class="col-sm-8 form-control form-control-sm" />
            </div>
          </div>

          <div class=" p-1">
            <div class="row mb-3">
              <label  class="col form-label">Units Sold</label>
              <input type="text" name="units_sold" class="col-sm-8 form-control form-control-sm" />
            </div>
          </div>

          <div class=" p-1">
            <div class="mb-3 row">
              <label  class="form-label col">Royalty</label>
              <input type="text" name="royalty" class="col-sm-8 form-control form-control-sm" />
            </div>
          </div>

          <div class="p-1">
            <div class="row mb-3">
              <input class="btn btn-primary text-sm form-control form-control-sm" id="addAuthorForm" name="submit" type="submit" value="Save">
            </div>
          </div>
      </div>
    </form>
    </div>
    </div>
  </div>
</div>
