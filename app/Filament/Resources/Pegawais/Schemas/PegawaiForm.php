<?php

namespace App\Filament\Resources\Pegawais\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PegawaiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Mengubah user_id menjadi Select Dropdown Relasional
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Akun User'),

                TextInput::make('nim')
                    ->required()
                    ->label('NIM'),

                TextInput::make('nama')
                    ->required()
                    ->label('Nama Lengkap'),

                // Mengubah gender menjadi Select Pilihan yang Valid
                Select::make('gender')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required()
                    ->label('Jenis Kelamin'),

                Select::make('divisi_id')
                    ->relationship('divisi', 'nama_divisi')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Divisi'),

                Select::make('jabatan_id')
                    ->relationship('jabatan', 'nama_jabatan')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Jabatan'),

                TextInput::make('tmp_lahir')
                    ->required()
                    ->label('Tempat Lahir'),

                DatePicker::make('tgl_lahir')
                    ->required()
                    ->label('Tanggal Lahir'),

                TextInput::make('hp')
                    ->required()
                    ->label('No. HP'),

                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull()
                    ->label('Alamat Tinggal'),

                FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->directory('pegawai')
                    ->imageEditor()
                    ->maxSize(2048)
                    ->nullable(),
            ]);
    }
}
