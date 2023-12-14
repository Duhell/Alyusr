<div class="w-[1228px] mx-auto">
    <p class="font-semibold text-2xl">Inquire Form</p>
    @if (session('success'))
        <span class="text-green-600">{{ session('success') }}</span>
    @endif
    <form  wire:submit="inquire_save">
        @csrf
        <div>
            <label>Full Name</label>
            <input required autocomplete="off" wire:model="fullName" type="text">
        </div>

        <div>
            <label>Contact No.</label>
            <input required autocomplete="off" wire:model="contactNo" type="text">
        </div>

        <div>
            <label>Email</label>
            <input required autocomplete="off" wire:model="email" type="email">
        </div>

        <div>
            <label>Company No. / Company Registration</label>
            <input required autocomplete="off" wire:model="companyRegistration" type="text">
        </div>

        <div>
            <label>Inquire Documents</label>
            <input wire:model="files.inquireDocs" type="file">
        </div>

        <div>
            <label>National ID</label>
            <input wire:model="files.national_id" type="file">
        </div>

        <div>
            <label>Company Registration</label>
            <input   wire:model="files.company_registration" type="file">
        </div>

        <div>
            <label>Other Documents</label>
            <input   wire:model="files.otherDocs" type="file">
        </div>

        <div>
            <label>Message</label>
            <textarea wire:model="message"  rows="10"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
