@push('css')
    <style>
        #productList {
            max-height: 200px;
            overflow-y: auto;
            cursor: pointer;
        }

        #productList li {
            padding: 10px;
            border: 1px solid #ddd;
        }

        #productList li:hover {
            background-color: #2d4cf7;
            color: #ddd;
        }
    </style>
    <style>
        .small-input {
            width: 80px;
            /* Adjust width as needed */
            text-align: right;
            font-size: 0.875rem;
            /* Slightly smaller font size */
        }

        .small-input::placeholder {
            color: #6c757d;
            /* Placeholder color */
        }

        /* Hide the spinners in Chrome, Safari, Edge, and Opera */
        .styled-number-input::-webkit-inner-spin-button,
        .styled-number-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hide the spinners in Firefox */
        .styled-number-input::-moz-appearance {
            appearance: none;
        }

        .styled-input {
            text-align: center;
            border: none;
            /* border-bottom: 1px dashed #000; */
            padding: 5px;
            font-size: 16px;
            background-color: transparent;
            cursor: text;
            transition: border 0.3s ease, background-color 0.3s ease;
        }

        .styled-input:focus {
            outline: none;
            border-bottom: 1px solid #000;
            background-color: #f0f0f0;
        }
    </style>
@endpush
