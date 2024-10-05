<x-data-entry.form action="{{ route('organization.store') }}" :hasFile="true">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo">
                        </div>
                        <div class="mb-3">
                            <label for="favicon">Favicon</label>
                            <input type="file" class="form-control" name="favicon" id="favicon">
                        </div>
                        <div class="mb-3">
                            <label for="footer_logo">Footer Logo:</label>
                            <input type="file" class="form-control" name="footer_logo" id="footer_logo">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="mb-3">
                            <label for="facebook">Facebook:</label>
                            <input type="text" class="form-control" name="facebook" id="facebook">
                        </div>
                        <div class="mb-3">
                            <label for="twitter">Twitter:</label>
                            <input type="text" class="form-control" name="twitter" id="twitter">
                        </div>
                        <div class="mb-3">
                            <label for="skype">Skype:</label>
                            <input type="text" class="form-control" name="skype" id="skype">
                        </div>
                        <div class="mb-3">
                            <label for="linkdein">Linkdein:</label>
                            <input type="text" class="form-control" name="linkdein" id="linkdein">
                        </div>
                        <div class="mb-3">
                            <label for="currency">Currency:</label>
                            <input type="text" class="form-control" name="currency" id="currency">
                        </div>
                        <div class="mb-3">
                            <label for="time_zone">Time Zone:</label>
                            <input type="text" class="form-control" name="time_zone" id="time_zone">
                        </div>
                        <div class="mb-3">
                            <label for="telephone_no">TelePhone:</label>
                            <input type="text" class="form-control" name="telephone_no" id="telephone_no">
                        </div>
                    </div>
                </div>
            </x-data-entry.form>