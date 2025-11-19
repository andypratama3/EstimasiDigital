@push('css')
    <link href="https://cdn.bootcdn.net/ajax/libs/quill/1.3.7/quill.snow.min.css" rel="stylesheet" />
    <style>

    .border-left-warning {
        border-left: 4px solid #ffc107 !important;
    }

    .border-left-danger {
        border-left: 4px solid #dc3545 !important;
    }

    .form-check {
        position: relative;
        display: block;
        padding-left: 0;
    }

    .form-check-input {
        position: relative;
        float: left;
        margin-left: 0;
        margin-right: 8px;
        margin-top: 3px;
        width: 20px;
        height: 20px;
        cursor: pointer;
        border: 1.5px solid #ddd;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .form-check-input:hover {
        border-color: #667eea;
    }

    .form-check-input:checked {
        background-color: #667eea;
        border-color: #667eea;
        box-shadow: inset 0 3px 4px rgba(0, 0, 0, 0.1);
    }

    .form-check-label {
        margin-bottom: 0;
        cursor: pointer;
        user-select: none;
        font-weight: 500;
        color: #333;
    }

    .form-check-label strong {
        display: inline-block;
        font-weight: 600;
    }

    .form-check-label small {
        display: block;
        margin-top: 6px;
        line-height: 1.4;
    }

    .form-check-flat .form-check-input {
        border-radius: 2px;
    }

    .form-check-primary .form-check-input:checked {
        background-color: #667eea;
        border-color: #667eea;
    }

    .form-check-danger .form-check-input:checked {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .alert-warning {
        background-color: #fff8e1;
        border: 1px solid #ffe082;
        border-radius: 6px;
        color: #856404;
    }

    .alert-warning i {
        margin-right: 8px;
    }

    .badge {
        padding: 6px 10px;
        font-size: 12px;
        font-weight: 500;
    }

    .text-muted {
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .form-section-title {
            font-size: 12px;
        }

        .card-body {
            padding: 15px;
        }
    }
    </style>
@endpush
@push('scripts')
    <script src="https://cdn.bootcdn.net/ajax/libs/quill/1.3.7/quill.min.js"></script>
    <script src="https://unpkg.com/quill-resize-image@1.0.5/dist/quill-resize-image.min.js"></script>
@endpush
