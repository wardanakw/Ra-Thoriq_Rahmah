<!-- resources/views/layouts/footer.blade.php -->

<footer class="main-footer">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <strong>
                    <i class="bi bi-stars" style="color: #FF6B6B;"></i>
                    2026 &copy; Sistem Penilaian Perkembangan Anak RA
                </strong>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <span class="text-muted">
                    <i class="bi bi-heart-fill" style="color: #FF6B6B;"></i>
                    RA Thoriqur Rahmah
                </span>
            </div>
        </div>
    </div>
</footer>

<style>
    /* ============================
           FOOTER STYLE
        ============================ */
    .main-footer {
        background: linear-gradient(135deg, #FF6B6B, #FF8E8E, #FFB3B3);
        color: #fff;
        padding: 20px 0;
        margin-left: 250px;
        border-top: 4px solid #FFE66D;
        box-shadow: 0 -4px 20px rgba(255, 107, 107, 0.15);
        transition: all 0.3s ease;
        position: relative;
        bottom: 0;
        width: calc(100% - 250px);
    }

    .main-footer strong {
        font-weight: 700;
        font-size: 15px;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .main-footer .text-muted {
        color: rgba(255, 255, 255, 0.9) !important;
        font-weight: 600;
        font-size: 14px;
    }

    .main-footer i {
        margin-right: 6px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .main-footer {
            margin-left: 0;
            width: 100%;
        }

        .main-footer strong {
            font-size: 13px;
        }

        .main-footer .text-muted {
            font-size: 12px;
        }
    }

    @media (max-width: 576px) {
        .main-footer {
            padding: 15px 0;
        }

        .main-footer .col-md-6 {
            margin-bottom: 5px;
        }

        .main-footer strong {
            font-size: 12px;
        }

        .main-footer .text-muted {
            font-size: 11px;
        }
    }
</style>