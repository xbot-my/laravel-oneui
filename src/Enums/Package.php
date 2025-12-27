<?php

namespace XBot\OneUI\Enums;

enum Package
{
    case Bootstrap;
    case BootstrapDatepicker;
    case BootstrapMaxlength;
    case BootstrapNotify;
    case DataTables;
    case MagnificPopup;
    case EasyPieChart;
    case IonRangeSlider;
    case Select2;
    case SimpleBar;
    case jVectorMap;
    case Slick;
    case Vide;
    case ChartJs;
    case CKEditor5;
    case CropperJs;
    case DropzoneJs;
    case Flatpickr;
    case FullCalendar;
    case HighlightJs;
    case SimpleMDE;
    case SweetAlert2;
    
    case jQuery;
    case jQueryAppear;
    case jQueryCountdown;
    case jQuerySparkline;
    case jQueryValidation;
    case jQueryMaskedInput;
    case jQueryRaty;
    
    public function name(): string
    {
        return match ( $this ) {
            Package::Bootstrap           => 'Bootstrap',
            Package::BootstrapDatepicker => 'Bootstrap Datepicker',
            Package::BootstrapMaxlength  => 'Bootstrap Maxlength',
            Package::BootstrapNotify     => 'Bootstrap Notify',
            Package::jQuery              => 'jQuery',
            Package::jQueryAppear        => 'jQuery Appear',
            Package::jQueryCountdown     => 'jQuery Countdown',
            Package::jQuerySparkline     => 'jQuery Sparkline',
            Package::jQueryValidation    => 'jQuery Validation',
            Package::jQueryMaskedInput   => 'jQuery Masked Input',
            Package::jQueryRaty          => 'jQuery Raty',
            Package::Vide                => 'Vide',
            Package::Slick               => 'Slick',
            Package::Select2             => 'Select2',
            Package::SimpleBar           => 'SimpleBar',
            Package::jVectorMap          => 'jVectorMap',
            Package::DataTables          => 'DataTables',
            Package::EasyPieChart        => 'EasyPieChart',
            Package::IonRangeSlider      => 'IonRangeSlider',
            Package::MagnificPopup       => 'MagnificPopup',
            Package::ChartJs             => 'Chart.js',
            Package::CKEditor5           => 'CKEditor5',
            Package::CropperJs           => 'Cropper.js',
            Package::DropzoneJs          => 'Dropzone.js',
            Package::Flatpickr           => 'Flatpickr',
            Package::FullCalendar        => 'FullCalendar',
            Package::HighlightJs         => 'Highlight.js',
            Package::SimpleMDE           => 'SimpleMDE',
            Package::SweetAlert2         => 'SweetAlert2',
        };
    }
    
    public function version(): string
    {
        return match ( $this ) {
            Package::Bootstrap           => '5.3.8',
            Package::BootstrapDatepicker => '1.10.0',
            Package::BootstrapMaxlength  => '2.0.0',
            Package::BootstrapNotify     => '3.1.3',
            Package::jQuery              => '3.7.1',
            Package::jQueryAppear        => '1.0.0',
            Package::jQueryCountdown     => '2.2.0',
            Package::jQuerySparkline     => '2.4.1',
            Package::jQueryValidation    => '1.20.0',
            Package::jQueryMaskedInput   => '1.4.1',
            Package::jQueryRaty          => '3.1.1',
            Package::Vide                => '0.5.1',
            Package::Slick               => '1.8.1',
            Package::Select2             => '4.0.13',
            Package::SimpleBar           => '6.3.3',
            Package::jVectorMap          => '3.1.2',
            Package::DataTables          => '2.2.2',
            Package::EasyPieChart        => '2.1.7',
            Package::IonRangeSlider      => '2.3.1',
            Package::MagnificPopup       => '1.2.0',
            Package::ChartJs             => '4.5.1',
            Package::CKEditor5           => '44.3.0',
            Package::CropperJs           => '1.6.2',
            Package::DropzoneJs          => '5.9.3',
            Package::Flatpickr           => '4.6.13',
            Package::FullCalendar        => '6.1.19',
            Package::HighlightJs         => '9.16.2',
            Package::SimpleMDE           => '1.11.2',
            Package::SweetAlert2         => '11.126.3',
        };
    }
    
    public static function get( string $name ): ?Package
    {
        //
    }
}
