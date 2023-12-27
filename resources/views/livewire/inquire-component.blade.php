<div>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Client Inquiry Form</span>
                        <h1 class="text-capitalize mb-5 text-lg">Client Inquiry Form</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                <label data-original="Fullname/الاسم الكامل"  class="language-label">Fullname</label>
                                <input type="text" class="form-control" wire:model="fullName">
                            </div>
                            <div class="col-6 mt-2">
                                <label data-original="Contact No. / رقم الاتصال" class="language-label">Contact No.</label>
                                <input type="text" class="form-control" wire:model="contactNo">
                            </div>
                            <div class="col-6 mt-2">
                                <label data-original="Email / البريد الإلكتروني" class="language-label">Email</label>
                                <input type="email" class="form-control" wire:model="email">
                            </div>
                            <div class="col-6 mt-2">
                                <label data-original="Company No. or Company Registration / رقم الشركة" class="language-label">Company No. or Company Registration</label>
                                <input type="text" class="form-control" wire:model="companyRegistration">
                            </div>
                            <!-- File Input -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label data-original="Inquiry Documents/وثائق الاستفسار" class="language-label">Inquiry Documents</label>
                                        <input type="file" class="form-control" wire:model="files.inquireDocs" id="inquiry_document">
                                        <div wire:loading wire:target="files.inquireDocs">Uploading...</div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label data-original="National I.d/ الهويه الوطنيه" class="language-label">National I.d</label>
                                        <input type="file" class="form-control" wire:model="files.national_id" id="national_id">
                                        <div wire:loading wire:target="files.national_id">Uploading...</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label data-original="Company  Registration/تسجيل الشريكة" class="language-label">Company  Registration</label>
                                        <input type="file" class="form-control" wire:model="files.company_registration" id="company_registration">
                                        <div wire:loading wire:target="files.company_registration">Uploading...</div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label data-original="Other documents/وثائق أخرى" class="language-label">Other documents</label>
                                        <input type="file" class="form-control" wire:model="files.otherDocs" id="other_document">
                                        <div wire:loading wire:target="files.otherDocs">Uploading...</div>
                                    </div>
                                </div>
                            </div>


                            <!-- End of File Input -->
                            <div class="col-12 mt-2">
                                <label data-original="Message/رسالة" class="language-label">Message</label>
                                <textarea class="form-control" rows="10" wire:model="message"></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Submit Inquiry</span>
                                    <span wire:loading>Loading...</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
