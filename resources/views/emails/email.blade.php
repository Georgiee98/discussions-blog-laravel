@extends('index')
<div class="container my-5">
    <footer class="text-center text-white" style="background-color: #45637d;">
        <div class="container p-4">
            <section class="">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="ratio ratio-16x9">
                            <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/vlDzYIIOYmM"
                                title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Form for sending emails -->
            <section class="mt-4">
                <form id="emailForm" action="{{ route('send.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Email</button>
                </form>
            </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
    </footer>
</div>