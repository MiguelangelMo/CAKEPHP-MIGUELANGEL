<div style="display: flex;justify-content:space-between">
    <header>
        <h1 class="lead display-4">Welcome to Test</h1>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">New Product</button>
    </header>
    <div>
        <?= $this->Html->link('Exit', ['controller' => 'Users', 'action' => 'logout']) ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title lead" style="text-align: center;" id="exampleModalLabel">
                    Create Product
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="error-add" style="text-align: center; font-weight:bold;color: red"></p>
                <p id="success" style="text-align: center; font-weight:bold;color: green"></p>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nameNew">Name</label>
                        <input type="text" class="form-control" id="nameNew" name="nameNew" placeholder="Product name" required />
                    </div>
                    <div class="form-group">
                        <label for="DescriptionNew">Description</label>
                        <textarea class="form-control" id="DescriptionNew" name="DescriptionNew" placeholder="Product description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="PriceNew">Price</label>
                        <input type="number" class="form-control" min="0" id="PriceNew" name="PriceNew" required />
                    </div>
                    <div class="form-group">
                        <label for="imageNew">Image</label>
                        <input type="file" class="form-control" id="imageNew" name="imageNew" />
                    </div>
                    <input type="hidden" value="1" id="client" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title lead" style="text-align: center; font-weight: bold;" id="exampleModalLabel">
                    Edit Product
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="error-edit" style="text-align: center; font-weight:bold;color: red"></p>
                <p id="success-edit" style="text-align: center; font-weight:bold;color: green"></p>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nameEdit">Name</label>
                        <input type="text" class="form-control" id="nameEdit" name="nameEdit" placeholder="Product name" />
                    </div>
                    <div class="form-group">
                        <label for="DescriptionEdit">Description</label>
                        <textarea class="form-control" id="DescriptionEdit" name="DescriptionEdit" placeholder="Product description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="PriceEdit">Price</label>
                        <input type="number" class="form-control" min="0" id="PriceEdit" name="PriceNew" />
                    </div>
                    <input type="hidden" id="idEdit" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col" class="lead">Product</th>
            <th scope="col" class="lead">Description</th>
            <th scope="col" class="lead">Price</th>
            <th scope="col" class="lead">Image</th>
            <th scope="col" class="lead">Options</th>
        </tr>
    </thead>
    <tbody id="table-data">
        <?php
        // foreach ($product as $value) {
        ?>
        <!-- <tr>
                <td><input value="<?= $value->name ?>" class="form-control" type="text" name="nameUpdate" id="nameUpdate" disabled /></td>
                <td><input value="<?= $value->descripcion ?>" class="form-control" type="text" name="descUpdate" id="descUpdate" disabled /></td>
                <td><input value="<?= $value->price ?>" class="form-control" type="number" name="priceUpdate" id="priceUpdate" disabled /></td>
                <td>Imagen</td>
                <td>
                    <button type="button" class="btn btn-warning dalete" data-delete="<?= $value->id ?>">Delete</button>
                    <button type="button" class="btn btn-danger update" data-update="<?= $value->id ?>" data-toggle="modal" data-target="#updateModal">Edit</button>
                </td>
            </tr> -->
        <?php
        // }
        ?>
    </tbody>
</table>
<div class="card" style="display: none;">
    <div class="card-body" style="text-align: center;font-weight:bold;">
        Registration has been successfully removed
    </div>
</div>
<script>
    $(function() {
        $('#saveChanges').on('click', async (e) => {
            e.preventDefault();
            const name = $('#nameEdit').val();
            const desc = $('#DescriptionEdit').val();
            const price = $('#PriceEdit').val();
            const id = $('#idEdit').val();
            if (!name.length) {
                $('#error-edit').text('Please complete the name field');
                return null;
            }
            if (desc.length < 1) {
                $('#error-edit').text('Please complete the description field');
                return null;
            }
            if (!price.length) {
                $('#error-edit').text('Please complete the price field');
                return null;
            }
            const jsonServer = {
                "name": name,
                "desc": desc,
                "price": price,
            };
            const api = await fetch(`http://localhost:3000/products/${id}`, {
                method: 'PATCH',
                body: JSON.stringify(jsonServer),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            const json = await api.json();
            if (json) {
                $('#success-edit').text('The new product has been Edit');
            }
        });

        $('#save').on('click', async (e) => {
            e.preventDefault();
            const url = 'https://api.cloudinary.com/v1_1/dnlpihqbd/image/upload';
            const key = 'kefbf5lx';

            let imgCloud = '';
            const id = Math.floor(Math.random() * 10000000);
            const name = $('#nameNew').val();
            const desc = $('#DescriptionNew').val();
            const price = $('#PriceNew').val();
            const img = $('#imageNew')[0].files[0];
            if (!name.length) {
                $('#error-add').text('Please complete the name field');
                return null;
            }
            if (desc.length < 1) {
                $('#error-add').text('Please complete the description field');
                return null;
            }
            if (!price.length) {
                $('#error-add').text('Please complete the price field');
                return null;
            }
            if (img) {
                const formData = new FormData();
                formData.append('file', img);
                formData.append('upload_preset', key);
                const apImg = await fetch(url, {
                    method: 'post',
                    body: formData,
                });
                const jsonImg = await apImg.json();
                imgCloud = jsonImg.url;
            }
            const jsonServer = {
                "id": id,
                "name": name,
                "desc": desc,
                "price": price,
                "photo": imgCloud,
            };
            const api = await fetch('http://localhost:3000/products', {
                method: 'POST',
                body: JSON.stringify(jsonServer),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            const json = await api.json();
            if (json) {
                const name = $('#nameNew').val('');
                const desc = $('#DescriptionNew').val('');
                const price = $('#PriceNew').val(0);
                const photo = $('#imageNew').val('');
                $('#success').text('The new product has been registered');
            }
        });

        const getData = async () => {
            const api = await fetch('http://localhost:3000/products');
            const json = await api.json();
            $.each(json, (i, e) => { //i = index , e = elemento
                $('#table-data').append(
                    `<tr>
                <td> ${e.name} </td>
                <td> ${e.desc} </td>
                <td> ${e.price} </td>
                <td> <img src="${e.photo}" alt ="LOGO" id="logo_" width="50" /></td>
                <td> 
                    <button type="button" class="btn btn-warning" onClick="deleteItem(${e.id})">Delete</button>
                    <button type="button" class="btn btn-danger" onClick="updateItem(${e.id})" data-update="${e.id}" data-toggle="modal" data-target="#updateModal">Edit</button>
                </td>
                </tr>`)
            });
        }
        getData();
    });

    const deleteItem = async (id) => {
        console.log(id)
        const api = await fetch(`http://localhost:3000/products/${id}`, {
            method: 'delete'
        });
        const json = await api.json();
        console.log(json)
        if (json) {
            document.querySelector('.card').removeAttribute('style');
            setTimeout(() => {
                document.querySelector('.card').style.setProperty('display', 'none');
            }, 5000)
        }
    }

    const updateItem = async (id) => {
        const api = await fetch(`http://localhost:3000/products/${id}`);
        const json = await api.json();
        document.getElementById('nameEdit').value = json.name;
        document.getElementById('DescriptionEdit').value = json.desc;
        document.getElementById('PriceEdit').value = json.price;
        document.getElementById('idEdit').value = id;
    }
</script>