<div class="w-[1228px] mx-auto">
    <section>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-8 offset-md-2">
                    <form wire:submit="inquire_save">
                        @if (session('success'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" role="alert">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-2">
                                <label>Fullname/الاسم الكامل</label>
                                <input type="text" class="form-control" wire:model="fullName">
                            </div>
                            <div class="col-6 mt-2">
                                <label>Contact No. / رقم الاتصال</label>
                                <input type="text" class="form-control" wire:model="contactNo">
                            </div>
                            <div class="col-6 mt-2">
                                <label>Email / البريد الإلكتروني</label>
                                <input type="email" class="form-control" wire:model="email">
                            </div>
                            <div class="col-6 mt-2">
                                <label>Company No. / Company Registration / رقم الشركة</label>
                                <input type="text" class="form-control" wire:model="companyRegistration">
                            </div>
                            <!-- File Input -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label>Inquiry Documents/وثائق الاستفسار</label>
                                        <input type="file" class="form-control" wire:model="files.inquireDocs" id="inquiry_document">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label>National I.d/ الهويه الوطنيه</label>
                                        <input type="file" class="form-control" wire:model="files.national_id" id="national_id">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label>Company  Registration/تسجيل الشريكة</label>
                                        <input type="file" class="form-control" wire:model="files.company_registration" id="company_registration">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label>Other documents/وثائق أخرى</label>
                                        <input type="file" class="form-control" wire:model="files.otherDocs" id="other_document">
                                    </div>
                                </div>
                            </div>
                            <div wire:loading>Uploading...</div>

                            <!-- End of File Input -->
                            <div class="col-12 mt-2">
                                <label>Message/رسالة</label>
                                <textarea class="form-control" rows="10" wire:model="message"></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary w-100">Submit Inquiry</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
