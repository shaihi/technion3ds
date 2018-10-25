from os import system

def a2pdf(txt_path, pdf_path):
    ps_path = txt_path + '.ps'
    system('a2ps %s -o %s --columns=1 --rows=1 -B -1' % (txt_path, ps_path))
    system('ps2pdf %s %s' % (ps_path, pdf_path))
    system('rm %s' % ps_path)

def merge(form_path, resume_path, transcript_path, cover_letter_path, output_path):
    system('pdftk %s %s %s %s output %s' % (form_path, resume_path, transcript_path, cover_letter_path, output_path))

def generate(txt_path, resume_path, transcript_path, cover_letter_path, output_path):
    form_path = txt_path + '.pdf'
    a2pdf(txt_path, form_path)
    merge(form_path, resume_path, transcript_path, cover_letter_path, output_path)
    system('rm %s' % form_path)

def merge2(form_path, resume_path, output_path):
    system('pdftk %s %s output %s' % (form_path, resume_path, output_path))

# only merge two files
def generate2(txt_path, resume_path, output_path):
    form_path = txt_path + '.pdf'
    a2pdf(txt_path, form_path)
    merge2(form_path, resume_path, output_path)
    system('rm %s' % form_path)

"""
usage:

import pdfgen
pdfgen.generate('form.txt', 'resume.pdf', 'trans.pdf', 'cover_letter.pdf', 'all.pdf')

all.pdf naming pattern: <given_name>_<family_name>_<school>_<major>_<grade>.pdf
"""
