from pyPdf import PdfFileReader

# Return value:
#  1: valid
#  0: invalid
# -1: file does not exist
def isPDF(file_path):
    try:
        doc = PdfFileReader(file(file_path, "rb"))
        return 1
    except IOError as e:
        return -1
    except Exception as e:
        return 0
    

if __name__=="__main__":
    import sys
    
    print isPDF(sys.argv[1])
    # print 'x';
