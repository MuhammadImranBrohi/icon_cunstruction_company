@extends('layouts.app')

@section('title', 'FAQ')
@section('page_title', 'Frequently Asked Questions')

@section('content')
    <div class="container-fluid">

        <!-- Header Section -->
        <div class="mb-4">
            <h3 class="fw-bold text-primary">Construction Company FAQs</h3>
            <p class="text-muted">Common questions and answers related to projects, billing, materials, and documentation.
            </p>
        </div>

        <!-- Search FAQ -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form class="row g-2 align-items-center">
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Search for a question...">
                    </div>
                    <div class="col-md-2 text-end">
                        <button class="btn btn-primary w-100">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- FAQ Accordion -->
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        How can I upload my project documents?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can upload all project-related documents from the <strong>Documents → Upload</strong> section.
                        Supported formats include PDF, DOCX, and images up to 10MB each.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo">
                        Who approves the uploaded documents?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Uploaded documents are reviewed and approved by the <strong>Project Manager</strong>. You can track
                        approval status in your dashboard.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree">
                        What happens if a document is rejected?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Rejected documents will appear in the “Rejected” tab with feedback notes. You can re-upload
                        corrected versions anytime.
                    </div>
                </div>
            </div>
        </div>

        <!-- Feedback -->
        <div class="mt-5">
            <h5>Still have questions?</h5>
            <form class="card p-3 mt-3">
                <textarea class="form-control mb-3" placeholder="Ask your question here..." rows="3"></textarea>
                <button class="btn btn-success">Submit Question</button>
            </form>
        </div>

    </div>
@endsection
