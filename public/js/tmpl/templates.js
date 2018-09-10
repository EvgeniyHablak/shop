var Templates = {};


Templates.newPropTmpl = [`
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Product preview</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <img src="/img/test.svg" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h1 class="product-name">Name: <%= product.title %></h1>
                        <h2 class="product-price">Price: $<%= product.price %></h2>
                        <h2 class="">Added to favorite 0 times</h2>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <ul>
                            <li><a class="btn btn-success" href="#">Add to favorite</a></li>
                            <li><a class="btn btn-success" href="#">Add to compare</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul>
                            <% _.each( product.properties, function( property ){ %>
                                <li><%= property.title %>: <%= property.value %></li>
                            <% }); %>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-preview" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary create-product-btn">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
`].join("\n");